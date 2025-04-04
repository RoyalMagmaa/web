import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const profilIcon = document.getElementById('profil-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');

    profilIcon.addEventListener('click', function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    document.addEventListener('click', function (event) {
        if (!profilIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.getElementById('burger-menu');
    const mainMenu = document.getElementById('main-menu');

    burgerMenu.addEventListener('click', function () {
        mainMenu.classList.toggle('active');
    });
});