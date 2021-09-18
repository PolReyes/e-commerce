<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $table = "venta_detalle";

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
