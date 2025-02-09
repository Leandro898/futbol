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
                    <!-- <span class="pb-2"
                    style="border-bottom: 2px solid;">¿Quieres contarle algo a tu comunidad?
                    </span> -->
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
                        <textarea id="postContent" class="form-control" rows="3" placeholder="¿Quieres contarle algo a tu comunidad?"></textarea>
                        <button class="btn btn-outline-secondary">Multimedia</button>
                    </div>

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Publicar</button>
                </div>
            </div>
        </div>
    </div>

        





    

@endsection
