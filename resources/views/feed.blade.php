@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="content" class="form-control mb-2" placeholder="Escribe algo..." required></textarea>
        <input type="file" name="media" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>

    <hr>

    @foreach($posts as $post)
        <div class="card my-3">
            <div class="card-body">
                <p><strong>{{ $post->user->name }}</strong></p>
                <p>{{ $post->content }}</p>
                @if($post->media)
                    <img src="{{ asset('storage/'.$post->media) }}" class="img-fluid">
                @endif

                <form action="{{ route('comment.store') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="text" name="content" class="form-control" placeholder="Comentar..." required>
                    <button type="submit" class="btn btn-sm btn-success mt-2">Comentar</button>
                </form>

                @foreach($post->comments as $comment)
                    <p class="mt-2"><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
