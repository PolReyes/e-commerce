<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    protected $table = "clientes";

    protected $fillable = [
        'nombre', 'email', 'password',
    ];

    protected $hidden = [
        'password'
    ];

    use SoftDeletes;
}
