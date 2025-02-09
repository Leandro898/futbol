@extends('layouts.app')

@section('content')

<div class="container-fluid col-md-6 mt-5 py-3 rounded shadow">
    <div class="row py-3 px-3 ">
        <!-- Acá se abre el modal -->
        <h2>Crear publicación</h2>
        <div class="col-1 ">
            <img src="{{ asset('/storage/images/perfil.png') }}" alt="" style="max-width: 300px; height: 46px;">
            
        </div>
        <div class="col-11 ">
            <div class="pb-2 mt-2" style="border-bottom: 2px solid;">
                <a class="mt-2 text-decoration-none text-secondary"  data-bs-toggle="modal" data-bs-target="#createPostModal">
                ¿Quieres contarle algo a tu comunidad?
                </a>
        </div>
        <!-- Enlaces -->
        <div class="mt-4">
            <a class="me-3" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Multimedia
            </a>
            <a class="me-3" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Anuncio de búsqueda
            </a>
            <a class="" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Crear evento
            </a>
        </div>
    </div>            
</div>

<!-- Modal para crear una publicación -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalLabel">Crear publicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Textarea para el contenido de la publicación -->
                <div class="mb-3">
                    <textarea id="postContent" class="form-control single-line-textarea" rows="3" placeholder="¿Quieres contarle algo a tu comunidad?"></textarea>
                </div>

                <!-- Botón personalizado para cargar archivos multimedia -->
                <div class="mb-3">
                    <button id="uploadButton" class="btn btn-outline-secondary">Multimedia</button>
                    <!-- Input de archivo oculto -->
                    <input type="file" id="mediaInput" class="d-none" accept="image/*, video/*">
                </div>

                <!-- Contenedor para la previsualización -->
                <div id="previewContainer" class="mb-3" style="display: none;">
                    <p>Previsualización:</p>
                    <div id="preview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="publishButton">Publicar</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const uploadButton = document.getElementById('uploadButton');
    const mediaInput = document.getElementById('mediaInput');
    const previewContainer = document.getElementById('previewContainer');
    const preview = document.getElementById('preview');

    // Activar el input de archivo al hacer clic en el botón "Multimedia"
    uploadButton.addEventListener('click', function () {
        mediaInput.click(); // Simula un clic en el input oculto
    });

    // Escuchar cambios en el input de archivos
    mediaInput.addEventListener('change', function (event) {
        const file = event.target.files[0]; // Obtener el archivo seleccionado

        if (file) {
            previewContainer.style.display = 'block'; // Mostrar el contenedor de previsualización

            // Limpiar el contenedor de previsualización
            preview.innerHTML = '';

            // Crear un elemento para mostrar la previsualización
            if (file.type.startsWith('image/')) {
                // Si es una imagen
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                preview.appendChild(img);
            } else if (file.type.startsWith('video/')) {
                // Si es un video
                const video = document.createElement('video');
                video.src = URL.createObjectURL(file);
                video.style.maxWidth = '100%';
                video.style.height = 'auto';
                video.controls = true; // Añadir controles de reproducción
                preview.appendChild(video);
            }
        } else {
            // Si no se selecciona ningún archivo, ocultar el contenedor
            previewContainer.style.display = 'none';
        }
    });

    // Manejar el botón de publicar
    const publishButton = document.getElementById('publishButton');
    publishButton.addEventListener('click', function () {
        const content = document.getElementById('postContent').value;
        const file = mediaInput.files[0];

        if (!content && !file) {
            alert('Por favor, escribe algo o adjunta un archivo multimedia.');
            return;
        }

        // Aquí puedes enviar los datos al servidor usando AJAX o un formulario
        console.log('Contenido:', content);
        console.log('Archivo:', file);

        // Reiniciar el modal después de publicar
        document.getElementById('postContent').value = '';
        mediaInput.value = '';
        previewContainer.style.display = 'none';
        preview.innerHTML = '';
    });
});
</script>



@endsection
