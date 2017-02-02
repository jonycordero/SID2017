<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especificacion;
use App\Http\Requests\EspecificacionRequest;
use Session;


class EspecificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         return view('admin.especificacion.especificacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $especificacions = Especificacion::All();
        return Response()->json($especificacions->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecificacionRequest $request)
    {
        Especificacion::create([
            
            'descripcion' => $request['descripcion'],
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
      $especificacion = Especificacion::find($id);
        return Response()->json($especificacion->toArray());
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
        $especificacion = Especificacion::find($id);
        $especificacion->fill($request->all());
        $especificacion->save();
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
        Especificacion::destroy($id);
        return Response()->json([
            'mensaje'=>'Eliminado'
            ]);
    }
}
