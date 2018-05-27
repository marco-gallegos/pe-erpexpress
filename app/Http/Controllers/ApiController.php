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

class ApiController extends Controller
{
    //
    public function facturascliente($rfc){
    	//dump($request);
    	//dump($request->cliente);
    	$facturas = DB::select('call facturascliente(?)', [$rfc]);
    	//dump($facturas);
    	return response()->json($facturas);
    }

    public function articulos(){
    	$articulos = DB::select("call kardexarticulos");
    	//dump($articulos);
    	return response()->json($articulos);
    }

    public function clientes(){
    	$clientes = Cliente::all();
    	//dump($articulos);
    	return response()->json($clientes);
    }    
}
