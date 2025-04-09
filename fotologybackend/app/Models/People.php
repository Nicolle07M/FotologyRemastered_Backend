<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'first_name',       // Nombre
        'last_name',        // Apellido
        'phone',            // Teléfono
        'birth_date',       // Fecha de nacimiento
        'document_type_id', // Relación con document_types
        'document_number',  // Número de documento
        'photo',            // Foto (opcional)
        'address',          // Dirección
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    public function user()
{
    return $this->hasOne(Users::class, 'people_id');
}
}