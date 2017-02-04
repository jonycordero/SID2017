<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('indexPresentacion');
});
Route::get('/admin',function(){
	return view('indexAdmin');
});

Route::get('/login', function (){
    return view('login');  
});

Route::resource('categoria','CategoriaController');
	Route::get('categoria/delete/{id}','CategoriaController@destroy');


Route::resource('persona','PersonaController');
	//Route::get('persona/delete/{id}','PersonaController@destroy');

Route::resource('usuario','UsuarioController');
	//Route::get('usuario/delete/{id}','UsuarioController@destroy');

Route::resource('especificacion','EspecificacionController');
	//Route::get('especificacion/delete/{id}','EspecificacionController@destroy');

Route::resource('producto','ProductoController');

Route::resource('registro','RegistroController');

Route::resource('persona-juridica','PersonaJuridicaController');
Route::resource('pedido','PedidoController');
Route::resource('trabajador','TrabajadorController');
Route::resource('persona-natural','PersonaNaturalController');
Route::resource('pago','PagoController');
Route::resource('descuento','DescuentoController');
Route::resource('detalle-pago','DetallePagoController');
Route::resource('detalle-pedido','DetallePedidoPagoController');
Route::resource('detalle-registro','DetalleRegistroController');
Route::resource('detalle-venta','DetalleVentaController');
Route::resource('stock','DetalleStockController');
Route::resource('venta','VentaController');





