<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\FacturaCompra;
use App\DetalleFacturaCompra;
use App\Articulo;

class FacturaCompraController extends Controller
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
        $proveedores = Proveedor::all();
        return view("facturac.create",compact("proveedores"));
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
        $facturacompra = new FacturaCompra;
        $facturacompra->total = 0;
        $facturacompra->subtotal=0;
        $facturacompra->fecha = date("Y-m-d");
        $facturacompra->rfcProveedor = $request->proveedorrfc;
        $facturacompra->save();
        //dd($request);
        return redirect("facturaCompraDetalle/{$facturacompra->Folio}");
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
        $facturacompra = FacturaCompra::find($folio);
        $productos = Articulo::all();
        $detalles = DetalleFacturaCompra::where("FolioFactura",$folio)->get();
        foreach ($detalles as $detalle) {
            $detalle->articulo = Articulo::find($detalle->idArticulo);
        }
        //dd($detalles);
        return View("facturac.facturadetalle",compact("facturacompra", "detalles","productos"));
    }

    public function facturadetallestore(Request $request, $folio){
        $detalle = new DetalleFacturaCompra;
        $detalle->FolioFactura = $folio;
        $detalle->idArticulo = $request->articulo;
        $detalle->cantidad = $request->cantidad;

        $articulo = Articulo::find($request->articulo);

        $detalle->precio = $articulo->precio;
        //dd($detalle);
        $detalle->save();
        return redirect("facturaCompraDetalle/{$folio}");
    }
}