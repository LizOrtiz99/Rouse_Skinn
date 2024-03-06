<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;

    protected $table = 'existencias'; // Si el nombre de la tabla es diferente, debes especificarlo aquí

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Accesor para obtener la categoría del producto
    public function getCategoriaAttribute()
    {
        return $this->producto->categoria;
    }

    // Accesor para obtener el proveedor del producto
    public function getProveedorAttribute()
    {
        return $this->producto->proveedor;
    }
}
