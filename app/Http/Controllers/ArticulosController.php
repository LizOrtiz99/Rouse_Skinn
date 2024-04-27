<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Proveedores;

class ArticulosController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos', compact('articulos'));
    }

    public function create()
    {

        $proveedor = Proveedores::all();
        return view('createarticulos', compact('proveedor'));
    }

    public function store(Request $request)
{

    $request->validate([
        'nombre' => 'required|string|max:255',
        'sku' => 'nullable|string|max:255',
        'categoria' => 'nullable|string|max:255',
        'proveedor_id' => 'required|exists:proveedores,id', 
        'lote' => 'nullable|string|max:255',
        'fecha_vencimiento' => 'nullable|date',
    ]);

   
    $requestData = $request->except('_token');

   
    Articulo::create($requestData);

    
    return redirect()->route('articulos.index')->with('success', 'Artículo agregado correctamente.');
}


    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $proveedor = Proveedores::all(); 
        return view('editarticulos', compact('articulo', 'proveedor'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'lote' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        $articulo = Articulo::findOrFail($id);
        $articulo->update($request->all());
        $requestData = $request->except('_token');

        return redirect()->route('articulos.index')->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy($id)
    {

        Articulo::findOrFail($id)->delete();
        return redirect()->route('articulos.index')->with('success', 'Artículo eliminado correctamente.');
    }
    public function show($id)
{
    
    $articulo = Articulo::findOrFail($id);
    
   
    return view('articulos', compact('articulo'));

}
public function proveedor()
{
    return $this->belongsTo(Proveedor::class);
}


}
