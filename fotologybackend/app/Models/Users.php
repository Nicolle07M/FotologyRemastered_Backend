<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'password',
    ];

    public function roles()
    {
        return $this->hasMany(UsersRole::class, 'user_id');
    }
    
        public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'user_id');
    }
}
