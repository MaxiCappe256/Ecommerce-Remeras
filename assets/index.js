const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

dropdownToggles.forEach(toggle => {
  toggle.addEventListener('click', e => {
    e.preventDefault();

    const submenu = toggle.nextElementSibling;
    submenu.classList.toggle('show');
  });
});
