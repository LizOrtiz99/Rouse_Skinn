<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'articulo_id', 'proveedor_id', 'cantidad', 'fecha',
    ];

    // Relación con el modelo Articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
