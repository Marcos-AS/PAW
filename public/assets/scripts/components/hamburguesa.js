class Hamburguesa {
  constructor() {

    const menuBtn = document.querySelector('.hamburguesa');
    const menu = document.querySelector('.menu');
    menuBtn.addEventListener('click', function() {
      menu.classList.toggle('show');
    });

    // Agregar evento de escucha para el enlace de "Institucional"
    const institucional = document.querySelectorAll('.dropdown')[0];
    const infoUtil = document.querySelectorAll('.dropdown')[3];
    
    if (infoUtil && institucional) {
      infoUtil.addEventListener('click', toggleSubMenu);
      institucional.addEventListener('click', toggleSubMenu);
    }

    function toggleSubMenu() {
        const subMenu = this.querySelector('.dropdown-menu');
        subMenu.classList.toggle('mostrar');
    }
}}
