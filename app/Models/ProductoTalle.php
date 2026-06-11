<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoTalle extends Model
{
    // Le avisamos que la tabla se llama así en plural (como la creamos en la migración)
    protected $table = 'producto_talles';

    protected $fillable = ['producto_id', 'talle', 'stock'];

    // Relación inversa: Un registro de talle pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
