<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:500',
        ]);

        // Crear el comentario
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->input('post_id');
        $comment->content = $request->input('comment');
        $comment->save();

        // Redirigir de vuelta al feed
        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }
}
