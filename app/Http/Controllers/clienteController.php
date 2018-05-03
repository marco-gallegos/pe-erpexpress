<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\cliente;
use App\Cliente;
class clienteController extends Controller
{
	function getClientes(){
		$clientes = cliente::all();
    	return view("clientes", [ "clientes" => $clientes ]);//poner comillas dobles
    }
    public function getClientesed($id){
        $clientes = cliente::findOrFail($id);
        return view("cliente-editar", [ "clientes" => $clientes ]);//poner comillas dobles
    }
    public function create(Request $request)
    {
    	$clientes = new cliente;
    	$clientes->Rfc = $request->rfc;
    	$clientes->nombre = $request->nombre;
    	$clientes->apellidos = $request->apellidos;
    	$clientes->saldo= $request->saldo;
    	$clientes->save();
    	return redirect('/clientes');
    }
    public function destroy($id)
    {
        cliente::findOrFail($id)->delete();
        //$clientes=clientes::findOrFail($id);
        //$clientes=clientes::find($id);
        //$clientes->delete();
        return redirect('/clientes');
    }
    public function edit(Request $request, $id)
    {
        $clientes=cliente::findOrFail($id);
        $clientes->Rfc = $request->rfc;
        $clientes->nombre = $request->nombre;
        $clientes->apellidos = $request->apellidos;
        $clientes->saldo= $request->saldo;
        $clientes->save();
        return redirect('/clientes');
    }
}
