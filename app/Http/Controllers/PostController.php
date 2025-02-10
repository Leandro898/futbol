<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ Importar Auth

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); // Obtener las publicaciones ordenadas por fecha
        return view('feed', compact('posts')); // Pasar las publicaciones a la vista
    }

        // Guardar una nueva publicación
        public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'content' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4|max:20480', // Archivos permitidos
        ]);

        // Crear una nueva publicación
        $post = new Post();
        $post->user_id = Auth::id(); // Asignar el ID del usuario autenticado
        $post->content = $request->input('content');

        // Manejar la carga de archivos multimedia
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $path = $file->store('images', 'public'); // Guarda el archivo en public/storage/images
            $post->media = basename($path); // Guarda solo el nombre del archivo (ejemplo: filename.jpg)
        }

        $post->save();

        return redirect()->route('feed')->with('success', 'Publicación creada exitosamente.');
    }
}
