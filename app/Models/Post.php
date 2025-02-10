<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'media'];

    // Opcional: Casts para manejar datos específicos
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    // Opcional: Ocultar campos sensibles si se usa JSON
    protected $hidden = ['user_id'];

    // Relación con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Usuario eliminado',
        ]);
    }

    // Relación con Comment
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Método auxiliar: Verificar si la publicación tiene multimedia
    public function hasMedia(): bool
    {
        return !empty($this->media);
    }

    // Método auxiliar: Obtener la URL completa del archivo multimedia
    public function getMediaUrl(): ?string
    {
        return $this->media ? asset('storage/' . $this->media) : null;
    }
}