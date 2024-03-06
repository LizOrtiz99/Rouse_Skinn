<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimientos;
use App\Models\Proveedores; // Cambié Proveedores por Proveedor, asumiendo que el modelo se llama así

class ExistenciasController extends Controller
{
    public function index()
    {
        // Cargar todos los proveedores
        
        $proveedor = Proveedores::all();

        // Retornar la vista de existencias junto con los proveedores
        return view('existencias', compact('proveedor'));
    }

    public function generarReporte(Request $request)
    {
        // Aquí puedes agregar la lógica para generar el reporte basado en los datos recibidos del formulario

        $proveedor = $request->input('proveedor');

        $movimientos = Movimiento::query();

        if ($proveedor && $proveedor != 'todos') {
            $movimientos->where('proveedor', $proveedor);
        }

        // Ejecuta la consulta
        $resultados = $movimientos->get();

        // Retorna los resultados a una vista para mostrar el reporte
        return view('existencias', ['resultados' => $resultados]);
    }
}