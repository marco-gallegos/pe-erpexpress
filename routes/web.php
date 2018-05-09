<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::get('user/role/{id}', 'UserController@role');
Route::post('user/linkrole/{id}', "UserController@linkrole");
Route::get('user/permission/{id}', 'UserController@permission');
Route::post('user/linkpermission/{id}', "UserController@linkpermission");

Route::resource('permission', 'PermissionController');

Route::resource('role', 'RoleController');
//vincular permisos a los roles
Route::get('role/permissions/{id}', 'RoleController@permissions');
Route::post('role/link/{id}', "RoleController@link");



Route::get('clientes','clienteController@getClientes');
Route::get('clientes/{id}','clienteController@getClientesed');
Route::post('clientes/create','clienteController@create');
Route::delete('clientes/{id}','clienteController@destroy');
Route::put('clientes/{id}','clienteController@edit');

//-----------------------------------------------------EMPLEADOS
Route::get('empleados','empleadoController@getEmpleados');
Route::get('empleados/{id}','empleadoController@getEmpleadosed');
Route::post('empleados/create','empleadoController@create');
Route::delete('empleados/{id}','empleadoController@destroy');
Route::put('empleados/{id}','empleadoController@edit');

//----------------------------------------------------PROVEEDORES
Route::get('proveedores','proveedorController@getProveedores');
Route::get('proveedores/{id}','proveedorController@getProveedoresed');
Route::post('proveedores/create','proveedorController@create');
Route::delete('proveedores/{id}','proveedorController@destroy');
Route::put('proveedores/{id}','proveedorController@edit');

//----------------------------------------------------ARTICULO
Route::get('articulos','articuloController@getArticulos');
Route::get('articulos/{id}','articuloController@getArticulosed');
Route::post('articulos/create','articuloController@create');
Route::delete('articulos/{id}','articuloController@destroy');
Route::put('articulos/{id}','articuloController@edit');

//----------------------------------------------FACTURA COMPRA
Route::resource('facturaCompra', 'FacturaCompraController');
Route::get("facturaCompraDetalle/{folio}", "FacturaCompraController@facturadetalle");
Route::post("facturaCompraDetallestore/{folio}", "FacturaCompraController@facturadetallestore");



Route::resource('factura', 'FacturaMController');
Route::get("facturadetalle/{folio}", "FacturaMController@facturadetalle");
Route::post("facturadetallestore/{folio}", "FacturaMController@facturadetallestore");


Route::get("reportes/facturascliente",function(){
	$clientes = App\Cliente::all();
	return view("reportes.facturascliente",compact("clientes"));
});
Route::post("reportes/facturascliente","ReportesController@facturascliente");


Route::get("reportes/facturasproveedor",function(){
	$proveedores = App\Proveedor::all();
	return view("reportes.facturasproveedor",compact("proveedores"));
});
Route::post("reportes/facturasproveedor","ReportesController@facturasproveedor");



Route::get("reportes/facturasfechacliente",function(){
	$clientes = App\Cliente::all();
	return view("reportes.facturasfechacliente",compact("clientes"));
});
Route::post("reportes/facturasfechacliente","ReportesController@facturasfechacliente");

Route::get("reportes/facturasfechaproveedor",function(){
	$proveedores = App\Proveedor::all();
	return view("reportes.facturasfechaproveedor",compact("proveedores"));
});
Route::post("reportes/facturasfechaproveedor","ReportesController@facturasfechaproveedor");


Route::get("reportes/kardexarticulos","ReportesController@kardexarticulos");

Route::get("reportes/articulosexistencia",function(){
	return view("reportes.articulosexistencia");
});
Route::post("reportes/articulosexistencia","ReportesController@articulosexistencia");