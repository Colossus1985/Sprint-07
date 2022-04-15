<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firstName',
        'lastName',
        'pseudo',
        'email',
        'password'
    ];

    public $timestamps = true;
    protected $dateFormat = 'Y/m/d H:i:s';
}
