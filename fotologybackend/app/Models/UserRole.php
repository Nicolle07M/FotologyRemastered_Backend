<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    protected $table = 'usersRole';

    protected $fillable = [
        'user_id',
        'role_id',
    ];

}
