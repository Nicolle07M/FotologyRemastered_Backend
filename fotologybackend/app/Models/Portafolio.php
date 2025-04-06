<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'photographer_id', // Relación con photographers
        'title',           // Título del portafolio
        'description',     // Descripción del portafolio
        'cover_image',     // Imagen de portada
    ];

    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }
}