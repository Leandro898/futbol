import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'bootstrap/dist/css/bootstrap.min.css';  // Importa los estilos de Bootstrap
import 'bootstrap';  // Importa los scripts de Bootstrap

// Script para manejar el menú desplegable -->
                
document.addEventListener('DOMContentLoaded', function () {
    const toggleElement = document.getElementById('profileDropdownToggle');
    const dropdownMenu = document.getElementById('profileDropdownMenu');

    // Alternar la visibilidad del menú al hacer clic
    toggleElement.addEventListener('click', function () {
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        } else {
            dropdownMenu.style.display = 'block';
        }
    });

    // Ocultar el menú si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        if (!toggleElement.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});