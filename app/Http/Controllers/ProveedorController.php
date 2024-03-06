<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Muestra la vista de proveedores.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Obtener todos los proveedores desde la base de datos
        $proveedores = Proveedores::all();

        // Retornar la vista de proveedores con los datos
        return view('proveedores', compact('proveedores'));
    }

    /**
     * Muestra el formulario para crear un nuevo proveedor.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function edit($id)
    {
        $proveedor = Proveedores::findOrFail($id);
        return view('editproveedores', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->name = $request->name;
        $proveedor->tax_identification_number = $request->tax_identification_number;
        //$proveedor->number = $request->number;
        $proveedor->email = $request->email;
        $proveedor->save();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }
    public function create()
    {
        return view('createproveedores');
    }

    /**
     * Almacena un nuevo proveedor en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'tax_identification_number' => 'required|string|max:255',
            //'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $proveedor = new Proveedores;
        $proveedor->name = $request->name;
        $proveedor->tax_identification_number = $request->tax_identification_number;
        //$proveedor->phone_number = $request->number;
        $proveedor->email = $request->email;
        $proveedor->save();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado correctamente.');
    }
    public function destroy($id)
{
    $proveedor = Proveedores::findOrFail($id);
    $proveedor->delete();

    return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
}

}   