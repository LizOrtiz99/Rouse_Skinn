<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Proveedores;
use App\Models\Movimientos;



class MovimientosController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        
        $proveedores = Proveedores::all();
        return view('movimientos', compact('articulos', 'proveedores'));
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'articulo_id' => 'required|exists:articulos,id',
        'proveedor_id' => 'required|exists:proveedores,id',
        'cantidad' => 'required|integer|min:1',
        'fecha' => 'required|date',
        'tipo' => 'required|in:entrada,salida', // Nuevo campo para el tipo de movimiento
    ]);

    // Crear un nuevo movimiento de mercancía
    $movimiento = new Movimiento();
    $movimiento->articulo_id = $request->articulo_id;
    $movimiento->proveedor_id = $request->proveedor_id;
    $movimiento->cantidad = $request->cantidad;
    $movimiento->fecha = $request->fecha;
    $movimiento->tipo = $request->tipo; // Asignar el tipo de movimiento

    $movimiento->save();

    // Redirigir a la página de inicio o a donde corresponda
    return redirect()->route('movimientos')->with('success', 'Movimiento de mercancía registrado correctamente.');
}
}