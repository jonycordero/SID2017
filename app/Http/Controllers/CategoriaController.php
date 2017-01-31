<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CatergoriaRequest;
use App\Categoria;
use Session;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categorias = Categoria::All();
        
   
        return view('admin.categoria.admCategoria',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatergoriaRequest $request)
    {
        Categoria::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            ]);
        Session::flash('message-susses','Categoria creada correctamente');
        return redirect('/categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idnombre
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
        Categoria::destroy($id);
        Session::flash('message-susses','Categoria eliminado correctamente');
        return redirect('/categoria');
    }
}
