(() => {
    const dialog = document.getElementById('home-menu');
    const opener = document.querySelector('[data-menu-open]');
    if (!dialog || !opener) return;
    let previousOverflow = '';
    opener.addEventListener('click', () => {
        previousOverflow = document.documentElement.style.overflow;
        dialog.showModal();
        opener.setAttribute('aria-expanded', 'true');
        document.documentElement.style.overflow = 'hidden';
    });
    dialog.querySelector('[data-menu-close]').addEventListener('click', () => dialog.close());
    dialog.addEventListener('close', () => {
        opener.setAttribute('aria-expanded', 'false');
        document.documentElement.style.overflow = previousOverflow;
    });
    dialog.querySelectorAll('a').forEach(link => link.addEventListener('click', () => dialog.close()));
    matchMedia('(min-width: 64rem)').addEventListener('change', event => {
        if (event.matches && dialog.open) dialog.close();
    });
})();
