@extends('layouts.app')

@section('content')
<div class="container-fluid col-md-6 mt-5 py-3 rounded shadow">
    <!-- Caja de Publicaciones -->
    <div class="row py-3 px-3 mb-4 border-bottom">
        <h2>Crear publicación</h2>
        <div class="col-1">
            <img src="{{ asset('/storage/images/perfil.png') }}" alt="Foto de perfil" style="max-width: 300px; height: 46px;">
        </div>
        <div class="col-11">
            <div class="pb-2 mt-2">
                <a class="mt-2 text-decoration-none text-secondary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                    ¿Quieres contarle algo a tu comunidad?
                </a>
            </div>
            <!-- Enlaces adicionales -->
            <div class="mt-4">
                <a class="me-3" data-bs-toggle="modal" data-bs-target="#createPostModal">Multimedia</a>
                <a class="me-3" data-bs-toggle="modal" data-bs-target="#createPostModal">Anuncio de búsqueda</a>
                <a class="" data-bs-toggle="modal" data-bs-target="#createPostModal">Crear evento</a>
            </div>
        </div>
    </div>
</div>

<!-- Publicaciones -->

<!-- Lista de Publicaciones -->
<div class="container col-md-6 rounded " style="margin-top: 100px;">
        
        @if($posts->isEmpty())
            <p>No hay publicaciones disponibles.</p>
        @else
            @foreach($posts as $post)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->user->name }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        @if($post->media)
                            <div>
                                @if(strpos($post->media, '.mp4') !== false)
                                    <video controls style="max-width: 100%; height: auto;">
                                        <source src="{{ asset('storage/images/' . $post->media) }}" type="video/mp4">
                                        Tu navegador no soporta videos.
                                    </video>
                                @else
                                    <img src="{{ asset('storage/images/' . $post->media) }}" alt="Media" style="max-width: 100%; height: auto;">
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
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
                <!-- Formulario para crear una publicación -->
                <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Textarea para el contenido -->
                    <div class="mb-3">
                        <textarea name="content" id="postContent" class="form-control single-line-textarea" rows="1" placeholder="¿Quieres contarle algo a tu comunidad?"></textarea>
                    </div>
                    <!-- Botón personalizado para cargar archivos multimedia -->
                    <div class="mb-3">
                        <button type="button" id="uploadButton" class="btn btn-outline-secondary">Multimedia</button>
                        <input type="file" name="media" id="mediaInput" class="d-none" accept="image/*, video/*">
                    </div>
                    <!-- Contenedor para la previsualización -->
                    <div id="previewContainer" class="mb-3" style="display: none;">
                        <p>Previsualización:</p>
                        <div id="preview"></div>
                    </div>
                    <!-- Botón de publicar -->
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar la carga de archivos y previsualización -->
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
            preview.innerHTML = ''; // Limpiar el contenedor de previsualización

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
});
</script>
@endsection