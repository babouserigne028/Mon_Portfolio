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

window.openCreateTechModal = function () {
    openModal('createTechModal', 'createTechModalCard');
};

window.closeCreateTechModal = function () {
    closeModal('createTechModal', 'createTechModalCard');
};

// ─── Modal Modifier ───────────────────────────────────────────────────────────

window.closeEditTechModal = function () {
    closeModal('editTechModal', 'editTechModalCard');
};

// ─── Initialisation ───────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-tech-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id       = this.dataset.id;
            const nom      = this.dataset.nom;
            const domaineIds = JSON.parse(this.dataset.domaines || '[]');

            document.getElementById('editTechForm').action = '/admin/technologies/' + id;
            document.getElementById('editTechNom').value   = nom;

            document.querySelectorAll('.edit-domaine-checkbox').forEach(function (cb) {
                cb.checked = domaineIds.includes(parseInt(cb.dataset.domaineId));
            });

            openModal('editTechModal', 'editTechModalCard');
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeCreateTechModal();
            closeEditTechModal();
        }
    });
});
