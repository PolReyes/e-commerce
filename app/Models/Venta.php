<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    protected $table= "ventas";
    use SoftDeletes;
    use HasFactory;

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
