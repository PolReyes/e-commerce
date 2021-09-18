<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    protected $table = "productos";

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    use SoftDeletes;
}
