// ─── Modal Créer ────────────────────────────────────────────────────────────

window.openCreateModal = function () {
    const modal = document.getElementById('createModal');
    const card  = document.getElementById('createModalCard');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    requestAnimationFrame(function () {
        card.classList.remove('translate-y-4', 'opacity-0');
        card.classList.add('translate-y-0', 'opacity-100');
    });
    document.body.classList.add('overflow-hidden');
};

window.closeCreateModal = function () {
    const modal = document.getElementById('createModal');
    const card  = document.getElementById('createModalCard');
    card.classList.remove('translate-y-0', 'opacity-100');
    card.classList.add('translate-y-4', 'opacity-0');
    setTimeout(function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }, 250);
};

// ─── Modal Modifier ──────────────────────────────────────────────────────────

window.closeEditModal = function () {
    const modal = document.getElementById('editModal');
    const card  = document.getElementById('editModalCard');
    card.classList.remove('translate-y-0', 'opacity-100');
    card.classList.add('translate-y-4', 'opacity-0');
    setTimeout(function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }, 250);
};

// ─── Initialisation ──────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', function () {

    // Boutons "Modifier" de chaque ligne
    document.querySelectorAll('.edit-domaine-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id      = this.dataset.id;
            const nom     = this.dataset.nom;
            const icone   = this.dataset.icone;
            const couleur = this.dataset.couleur;

            const modal = document.getElementById('editModal');
            const card  = document.getElementById('editModalCard');
            const form  = document.getElementById('editModalForm');

            form.action = '/admin/domaines/' + id;

            document.getElementById('editNom').value   = nom;
            document.getElementById('editIcone').value = icone;
            document.getElementById('iconePreview').textContent = icone || 'code';

            const safeColor = couleur && /^#[0-9a-fA-F]{6}$/.test(couleur) ? couleur : '#2563eb';
            document.getElementById('editCouleur').value           = safeColor;
            document.getElementById('couleurHexValue').textContent = safeColor;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            requestAnimationFrame(function () {
                card.classList.remove('translate-y-4', 'opacity-0');
                card.classList.add('translate-y-0', 'opacity-100');
            });
            document.body.classList.add('overflow-hidden');
        });
    });

    // Fermeture via Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeCreateModal();
            closeEditModal();
        }
    });
});
