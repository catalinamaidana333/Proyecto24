<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion', 
        'precio', 
        'imagen', 
        'categoria_id',      
        'descripcion_drop',  
        'diseñador',         
        'año',               
        'material',
        'estado',
    ];
    
    protected $casts = [
        'precio' => 'decimal:2',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function talles()
    {
        return $this->hasMany(ProductoTalle::class, 'producto_id');
    }

    /**
     * Obtiene el stock total sumando el stock de todos los talles asociados
     */
    public function getStockAttribute()
    {
        return $this->talles()->sum('stock');
    }

    /**
     * Scope local para filtrar solo los productos que están activos para la tienda
     */
    public function scopeActivo($query)
    {
        return $query->where('estado', 'activo');
    }
}