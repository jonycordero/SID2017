<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descuento;
use Session;
use App\Http\Requests\DescuentoRequest;

class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.descuento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $descuentos = Descuento::orderBy('nombre', 'asc')->get();
        
        return Response()->json($descuentos->toArray());
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescuentoRequest $request)
    {
        //
        Descuento::create([
            'nombre' => $request['nombre'],
            'tasa_descuento' => $request['tasa_descuento'],
            ]);
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
        $descuento = Descuento::find($id);
        return Response()->json($descuento->toArray());
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
        $descuento = Descuento::find($id);
        $descuento->fill($request->all());
        $descuento->save();
        return Response()->json([
            'mensaje'=>'Actualizado'
            ]);
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
        Descuento::destroy($id);
        
         return Response()->json([
            'mensaje'=>'Eliminado'
            ]);
         
    }
}
