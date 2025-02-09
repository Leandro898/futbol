@extends('layouts.app')

@section('content')

<div class="container-fluid col-md-6 mt-5 " >
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
</div>




@endsection
