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
            'tipo' => 'required|in:entrada,salida',
        ]);

        $movimiento = new Movimientos(); 
        $movimiento->articulo_id = $request->articulo_id;
        $movimiento->proveedor_id = $request->proveedor_id;
        $movimiento->cantidad = $request->cantidad;
        $movimiento->fecha = now();
        $movimiento->tipo = $request->tipo;

        $movimiento->save();

        return redirect()->route('movimientos.index')->with('success', 'Movimiento de mercancía registrado correctamente.');
    }
}