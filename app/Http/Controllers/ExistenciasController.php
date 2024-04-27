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
        
        $proveedores = Proveedores::all();

        // Retornar la vista de existencias junto con los proveedores
        return view('existencias', compact('proveedores'));
    }

    public function generarReportePDF()
{
    // Obtener todos los movimientos de inventario
    $movimiento = Movimientos::all();

    // Retornar la vista del PDF con los datos de los movimientos
    $pdf = PDF::loadView('reporte-existencias-pdf', ['movimientos' => $movimientos]);
    return $pdf->download('reporte_existencias.pdf');
}
}