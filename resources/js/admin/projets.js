// ─── Helpers ─────────────────────────────────────────────────────────────────

function openModal(modalId, cardId) {
    const modal = document.getElementById(modalId);
    const card  = document.getElementById(cardId);
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    requestAnimationFrame(function () {
        card.classList.remove('translate-y-4', 'opacity-0');
        card.classList.add('translate-y-0', 'opacity-100');
    });
    document.body.classList.add('overflow-hidden');
}

function closeModal(modalId, cardId) {
    const modal = document.getElementById(modalId);
    const card  = document.getElementById(cardId);
    card.classList.remove('translate-y-0', 'opacity-100');
    card.classList.add('translate-y-4', 'opacity-0');
    setTimeout(function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }, 250);
}

// ─── Modal Créer ─────────────────────────────────────────────────────────────

window.openCreateProjetModal = function () {
    openModal('createProjetModal', 'createProjetModalCard');
};

window.closeCreateProjetModal = function () {
    closeModal('createProjetModal', 'createProjetModalCard');
};

// ─── Modal Modifier ───────────────────────────────────────────────────────────

window.closeEditProjetModal = function () {
    closeModal('editProjetModal', 'editProjetModalCard');
};

// ─── Initialisation ───────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-projet-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id          = this.dataset.id;
            const nom         = this.dataset.nom;
            const description = this.dataset.description;
            const image       = this.dataset.image;
            const techIds     = JSON.parse(this.dataset.technologies || '[]');

            // Remplir le formulaire
            document.getElementById('editProjetForm').action = '/admin/projets/' + id;
            document.getElementById('editProjetNom').value         = nom;
            document.getElementById('editProjetDescription').value = description;

            // Image preview
            const preview = document.getElementById('editProjetImagePreview');
            if (image) {
                preview.src = '/storage/' + image;
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }

            // Cocher/décocher les technologies
            document.querySelectorAll('.edit-tech-checkbox').forEach(function (cb) {
                cb.checked = techIds.includes(parseInt(cb.dataset.techId));
            });

            openModal('editProjetModal', 'editProjetModalCard');
        });
    });

    // Fermeture via Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeCreateProjetModal();
            closeEditProjetModal();
        }
    });
});
