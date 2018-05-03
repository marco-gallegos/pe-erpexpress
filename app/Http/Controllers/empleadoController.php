<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
class empleadoController extends Controller
{
	function getEmpleados(){
		$empleados = empleado::all();
    	return view("empleados", [ "empleados" => $empleados ]);//poner comillas dobles
    }
    public function getEmpleadosed($id){
        $empleados = empleado::findOrFail($id);
        return view("empleado-editar", [ "empleados" => $empleados ]);//poner comillas dobles
    }
    public function create(Request $request)
    {
    	$empleados = new empleado;
    	$empleados->RFC = $request->rfc;
    	$empleados->nombre = $request->nombre;
    	$empleados->apellido = $request->apellidos;
    	$empleados->save();
    	return redirect('/empleados');
    }
    public function destroy($id)
    {
        empleado::findOrFail($id)->delete();
        //$clientes=clientes::findOrFail($id);
        //$clientes=clientes::find($id);
        //$clientes->delete();
        return redirect('/empleados');
    }
    public function edit(Request $request, $id)
    {
        $empleados=empleado::findOrFail($id);
        $empleados->RFC = $request->rfc;
        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellidos;
        $empleados->save();
        return redirect('/empleados');
    }
}
