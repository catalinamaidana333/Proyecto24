<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $fillable = ['nombre',
     'descripcion', 
     'precio', 
     'stock' , 
     'imagen', 
     'categoria_id',      
    'descripcion_drop',  
    'diseñador',         
    'año',               
    'material',];
    
    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
    ];

    // Adentro de class Producto extends Model:
public function talles()
{
    return $this->hasMany(ProductoTalle::class, 'producto_id');
}
}