<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PagoRequest;
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pagos.pagos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $pagos = Pago::All();
        return Response()->json($pagos->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagoRequest $request)
    {
        //
        Pago::create([
            'monto_total' => $request['monto_total'],
            'tipo_pago' => $request['tipo_pago'],
            'estado_pago' => $request['estado_pago'],
            'descuento' => $request['descuento'],
            'monto_con_descuento' => $request['monto_con_descuento'],
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
        $pago = Pago::find($id);
        return Response()->json($pago->toArray());
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
        $pago = Pago::find($id);
        $pago->fill($request->all());
        $pago->save();
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
        
        Pago::destroy($id);
        
         return Response()->json([
            'mensaje'=>'Eliminado'
            ]);
    }
}
