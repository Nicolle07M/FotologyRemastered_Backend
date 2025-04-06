<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // ID del usuario relacionado
        'email',         // Correo electrónico
        'bio',           // Biografía o descripción
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relación con el modelo User
    }

    public function photographies()
    {
        return $this->hasMany(Photography::class);
    }
}