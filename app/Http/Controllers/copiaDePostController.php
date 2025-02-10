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
        // Verificar si el usuario está autenticado
        if (!Auth::check()) { // ✅ Ahora sí funcionará
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para publicar.');
        }

        // Validación de los datos
        $validated = $request->validate([
            'content' => 'required|string',
            'media'   => 'nullable|image|max:2048', // Límite de 2MB para imágenes
        ]);

        // Procesar la imagen si existe
        $mediaPath = $request->hasFile('media')
            ? $request->file('media')->store('images', 'public')
            : null;

        // Crear el post
        Post::create([
            'user_id' => Auth::id(), 
            'content' => $validated['content'],
            'media'   => $mediaPath,
        ]);

        return redirect()->route('feed')->with('success', 'Publicación creada con éxito.');
    }
}
