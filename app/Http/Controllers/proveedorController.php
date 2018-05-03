<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
class proveedorController extends Controller
{
	function getProveedores(){
		$proveedores = proveedor::all();
    	return view("proveedores", [ "proveedores" => $proveedores ]);//poner comillas dobles
    }
    public function getProveedoresed($id){
        $proveedores = proveedor::findOrFail($id);
        return view("proveedor-editar", [ "proveedores" => $proveedores ]);//poner comillas dobles
    }
    public function create(Request $request)
    {
    	$proveedores = new proveedor;
    	$proveedores->RFC = $request->rfc;
    	$proveedores->razonSocial = $request->nombre;
    	$proveedores->apellido = $request->apellidos;
    	$proveedores->save();
    	return redirect('/proveedores');
    }
    public function destroy($id)
    {
        proveedor::findOrFail($id)->delete();
        //$clientes=clientes::findOrFail($id);
        //$clientes=clientes::find($id);
        //$clientes->delete();
        return redirect('/proveedores');
    }
    public function edit(Request $request, $id)
    {
        $proveedores=proveedor::findOrFail($id);
        $proveedores->RFC = $request->rfc;
        $proveedores->razonSocial = $request->nombre;
        $proveedores->apellido = $request->apellidos;
        $proveedores->save();
        return redirect('/proveedores');
    }
}
