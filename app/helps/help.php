<?php

use App\Producto;

/**
 *  Método para las monendas
 */
function moneda($monto){
    return "$". number_format($monto,2);
}

/**
 * Cantidad de productos por categoria
 */

function getCantProductos($id_cat){
    return Producto::where("categoria_id",$id_cat)->count();
}
