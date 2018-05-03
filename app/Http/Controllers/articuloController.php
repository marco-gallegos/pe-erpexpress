<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
class articuloController extends Controller
{
	function getArticulos(){
		$articulos = articulo::all();
    	return view("articulos", [ "articulos" => $articulos ]);//poner comillas dobles
    }
    public function getArticulosed($id){
        $articulos = articulo::findOrFail($id);
        return view("articulo-editar", [ "articulos" => $articulos ]);//poner comillas dobles
    }
    public function create(Request $request)
    {
    	$articulos = new articulo;
    	$articulos->nombre = $request->nombre;
    	$articulos->precio = $request->precio;
    	$articulos->descripcion = $request->descripcion;
    	$articulos->imagen = $request->imagen;
    	$articulos->existencia = $request->existencia;
    	$articulos->precioVenta = $request->precioventa;
    	$articulos->save();
    	return redirect('/articulos');
    }
    public function destroy($id)
    {
        articulo::findOrFail($id)->delete();
        //$clientes=clientes::findOrFail($id);
        //$clientes=clientes::find($id);
        //$clientes->delete();
        return redirect('/articulos');
    }
    public function edit(Request $request, $id)
    {
        $articulos=articulo::findOrFail($id);
    	$articulos->nombre = $request->nombre;
    	$articulos->precio = $request->precio;
    	$articulos->descripcion = $request->descripcion;
    	$articulos->imagen = $request->imagen;
    	$articulos->existencia = $request->existencia;
    	$articulos->precioVenta = $request->precioventa;
        $articulos->save();
        return redirect('/articulos');
    }
}
