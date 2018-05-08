<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Factura;
use App\DetalleFactura;
use App\Articulo;

class FacturaMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        return view("facturam.create",compact("clientes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $factura = new Factura;
        $factura->total = 0;
        $factura->fecha = date("Y-m-d");
        $factura->Empleado = $request->empleado;
        $factura->rfcCliente = $request->clienterfc;
        $factura->estado = "F";
        $factura->save();
        //dd($request);
        return redirect("facturadetalle/{$factura->Folio}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function facturadetalle($folio){
        $factura = Factura::find($folio);
        $productos = Articulo::all();
        $detalles = DetalleFactura::where("FolioFactura",$folio)->get();
        foreach ($detalles as $detalle) {
            $detalle->articulo = Articulo::find($detalle->idArticulo);
        }
        //dd($detalles);
        return View("facturam.facturadetalle",compact("factura", "detalles","productos"));
    }

    public function facturadetallestore(Request $request, $folio){
        $detalle = new DetalleFactura;
        $detalle->FolioFactura = $folio;
        $detalle->idArticulo = $request->articulo;
        $detalle->cantidad = $request->cantidad;

        $articulo = Articulo::find($request->articulo);

        $detalle->precio = $articulo->precioVenta;
        //dd($detalle);
        $detalle->save();
        return redirect("facturadetalle/{$folio}");
    }
}
