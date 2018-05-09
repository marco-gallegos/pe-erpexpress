<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Factura;
use App\DetalleFactura;
use App\FacturaCompra;
use App\DetalleFacturaCompra;
use App\Articulo;
use App\Cliente;
use App\Proveedor;

class ReportesController extends Controller
{
    //
    public function facturascliente(Request $request){
    	//dump($request);
    	//dump($request->cliente);
    	$facturas = DB::select('call facturascliente(?)', [$request->cliente]);
    	//dump($facturas);
    	$clientes = Cliente::all();
    	return view("reportes.facturascliente",compact("clientes","facturas"));
    }

    public function facturasproveedor(Request $request){
    	//dump($request);
    	//dump($request->cliente);
    	$facturas = DB::select('call facturasproveedor(?)', [$request->cliente]);
    	//dump($facturas);
    	$proveedores = Proveedor::all();
    	return view("reportes.facturasproveedor",compact("proveedores","facturas"));
    }

    public function facturasfechacliente(Request $request){
    	//dump($request);
    	//dump($request->cliente);
    	$facturas = DB::select('call facturasfechacliente(?)', [$request->fecha]);
    	//dump($facturas);
    	$clientes = Cliente::all();
    	return view("reportes.facturascliente",compact("clientes","facturas"));
    }


    public function facturasfechaproveedor(Request $request){
    	//dump($request->request);
    	//dump($request->cliente);
    	$facturas = DB::select('call facturasfechaproveedor(?)', [$request->fecha]);
    	//dump($facturas);
    	$proveedores = Proveedor::all();
    	return view("reportes.facturasfechaproveedor",compact("proveedores","facturas"));
    }

    public function kardexarticulos(){
    	$articulos = DB::select("call kardexarticulos");
    	//dump($articulos);
    	return view("reportes.kardexarticulos",compact("articulos"));
    }

    public function articulosexistencia(Request $request){
    	$articulos = DB::select("call articulosexistencia(?)",[$request->cantidad]);
    	//dump($articulos);
    	return view("reportes.kardexarticulos",compact("articulos"));
    }
}
