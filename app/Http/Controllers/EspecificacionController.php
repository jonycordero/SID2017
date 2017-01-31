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
         $especificacions = Especificacion::All();
         return view('admin.especificacion.especificacion',compact('especificacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Session::flash('message-susses','Especificacion creada correctamente');
        return redirect('/especificacion');
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
        Especificacion::destroy($id);
        Session::flash('message-susses','Especificacion eliminado correctamente');
        return redirect('/especificacion');
    }
}
