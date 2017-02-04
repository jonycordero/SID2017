<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaCreateRequest;
use Session;
use Redirect;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.persona.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas = Persona::All();
        return Response()->json($personas->toArray());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaCreateRequest $request)
    {
        
        
        //
        Persona::create([
            'dni' => $request['dni'],
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'apellido_materno' => $request['apellido_materno'],
        ]);
        return response()->json([
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
        $persona = Persona::find($id);
        return Response()->json($persona->toArray());
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
        $persona = Persona::find($id);
        $persona->fill($request->all());
        $persona->save();
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
        Persona::destroy($id);
        
         return Response()->json([
            'mensaje'=>'Eliminado'
            ]);
    }
    
    public function buscarDni($dni){
        
         $personadni = DB::table('persona')->where('dni', '=', 100)->get();
         return view('admin.persona.create', compact('personadni'));
    }    
}
