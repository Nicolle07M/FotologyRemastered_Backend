<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name', 'description'];

    public $timestamps = true;

    public function users()
    {
        return $this->hasMany(UsersRole::class, 'role_id');
    }
}