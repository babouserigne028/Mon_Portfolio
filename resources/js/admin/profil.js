document.addEventListener('DOMContentLoaded', function () {
    const form   = document.getElementById('profilForm');
    const btn    = document.getElementById('submitBtn');

    function enableBtn() {
        btn.disabled = false;
        btn.classList.remove('bg-primary/10', 'text-secondary', 'cursor-not-allowed', 'disabled:opacity-50');
        btn.classList.add('bg-cta', 'text-white', 'hover:bg-cta/90', 'active:scale-[0.98]', 'cursor-pointer');
    }

    form.querySelectorAll('input, textarea, select').forEach(function (el) {
        el.addEventListener('change', enableBtn);
        el.addEventListener('input', enableBtn);
    });
});
