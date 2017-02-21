<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.producto.admProducto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = Producto::query_producto();
        return Response()->json($producto->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    Producto::create($request->all());

    $img = $request->file('img');
    //$file_route = $img->getClientOriginalName();

    $file_route = "PRODUCTO".$request['codigo'].".jpg";



    Storage::disk('fotosproductos')->put($file_route,file_get_contents($img->getRealPath()));



        
        return Response()->json([
            'mensaje'=>'Creado'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::query_show_producto($id);
        return Response()->json($producto->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::query_show_producto($id);
        return Response()->json($producto->toArray());
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
         Producto::destroy($id);
        
         return Response()->json([
            'mensaje'=>'Eliminado'
            ]);
    }
}
