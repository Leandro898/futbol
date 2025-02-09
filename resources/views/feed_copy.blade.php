@extends('layouts.app')

@section('content')


<div class="container">
    <h2>Crear publicación</h2>
    <div class="mb-3">
        <label for="postContent" class="form-label">¿Quieres contarle algo a tu comunidad?</label>
        <textarea id="postContent" class="form-control" rows="3" placeholder="Escribe algo..."></textarea>
    </div>
    <div class="mb-3">
        <button class="btn btn-outline-secondary">Multimedia</button>
        <button class="btn btn-outline-secondary">Anuncio de búsqueda</button>
        <button class="btn btn-outline-secondary">Crear evento</button>
    </div>
</div>

<!-- Aquí se puede agregar el formulario existente para las publicaciones -->
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <textarea name="content" class="form-control mb-2" placeholder="Escribe algo..." required></textarea>
    <input type="file" name="media" class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Publicar</button>
</form>

@endsection