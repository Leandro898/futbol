import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'bootstrap/dist/css/bootstrap.min.css';  // Importa los estilos de Bootstrap
import 'bootstrap';  // Importa los scripts de Bootstrap


// Script para manejar el menú desplegable -->
                
// document.addEventListener('DOMContentLoaded', function () {
//     const toggleElement = document.getElementById('profileDropdownToggle');
//     const dropdownMenu = document.getElementById('profileDropdownMenu');

//     // Alternar la visibilidad del menú al hacer clic
//     toggleElement.addEventListener('click', function () {
//         if (dropdownMenu.style.display === 'block') {
//             dropdownMenu.style.display = 'none';
//         } else {
//             dropdownMenu.style.display = 'block';
//         }
//     });

//     // Ocultar el menú si se hace clic fuera de él
//     document.addEventListener('click', function (event) {
//         if (!toggleElement.contains(event.target) && !dropdownMenu.contains(event.target)) {
//             dropdownMenu.style.display = 'none';
//         }
//     });
// });

// Abrir el modal al hacer clic en el área de publicación
document.getElementById('openPostModal').addEventListener('click', function() {
    const postModal = new bootstrap.Modal(document.getElementById('postModal'));
    postModal.show();
});

// agarro el boton con el ID
// document.getElementById('js').addEventListener('click', function() {
//     alert('js guachow');
// })

// document.addEventListener('DOMContentLoaded', function () {
//     const uploadButton = document.getElementById('uploadButton');
//     const mediaInput = document.getElementById('mediaInput');
//     const previewContainer = document.getElementById('previewContainer');
//     const preview = document.getElementById('preview');

//     // Activar el input de archivo al hacer clic en el botón "Multimedia"
//     uploadButton.addEventListener('click', function () {
//         mediaInput.click(); // Simula un clic en el input oculto
//     });

//     // Escuchar cambios en el input de archivos
//     mediaInput.addEventListener('change', function (event) {
//         const file = event.target.files[0]; // Obtener el archivo seleccionado

//         if (file) {
//             previewContainer.style.display = 'block'; // Mostrar el contenedor de previsualización

//             // Limpiar el contenedor de previsualización
//             preview.innerHTML = '';

//             // Crear un elemento para mostrar la previsualización
//             if (file.type.startsWith('image/')) {
//                 // Si es una imagen
//                 const img = document.createElement('img');
//                 img.src = URL.createObjectURL(file);
//                 img.style.maxWidth = '100%';
//                 img.style.height = 'auto';
//                 preview.appendChild(img);
//             } else if (file.type.startsWith('video/')) {
//                 // Si es un video
//                 const video = document.createElement('video');
//                 video.src = URL.createObjectURL(file);
//                 video.style.maxWidth = '100%';
//                 video.style.height = 'auto';
//                 video.controls = true; // Añadir controles de reproducción
//                 preview.appendChild(video);
//             }
//         } else {
//             // Si no se selecciona ningún archivo, ocultar el contenedor
//             previewContainer.style.display = 'none';
//         }
//     });

//     // Manejar el botón de publicar
//     const publishButton = document.getElementById('publishButton');
//     publishButton.addEventListener('click', function () {
//         const content = document.getElementById('postContent').value;
//         const file = mediaInput.files[0];

//         if (!content && !file) {
//             alert('Por favor, escribe algo o adjunta un archivo multimedia.');
//             return;
//         }

//         // Aquí puedes enviar los datos al servidor usando AJAX o un formulario
//         console.log('Contenido:', content);
//         console.log('Archivo:', file);

//         // Reiniciar el modal después de publicar
//         document.getElementById('postContent').value = '';
//         mediaInput.value = '';
//         previewContainer.style.display = 'none';
//         preview.innerHTML = '';
//     });
// });