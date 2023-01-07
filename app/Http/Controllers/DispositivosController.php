<?php

namespace App\Http\Controllers;

use App\Models\Dispositivos;
use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dispositivos= Dispositivos::all();
        return view('dispositivos.index',compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dispoditivos.create');
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
        $request->validate(
            [
                'codpatri'=> 'required',
                'descripcion'=> 'required',
                'estado'=> 'required',
            ]
        );

        $input = $request->all();
        $code_pat = $request->input('codpatri');
        $descrip = $request->input('descripcion');
        $estado = $request->input('estado');

        // dd($pass);

        $dispositivo = new Dispositivos;

        $dispositivo->codpatrominal = $code_pat;
        $dispositivo->descripcion = $descrip;
        $dispositivo->estado = $estado;


        $dispositivo->save();

        return redirect()->route('dispositivos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function show(Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dispositivos = Dispositivos::find($id);
        // dd($evento);
        return view('dispositivos.edit',compact('dispositivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        //
        $evento = Dispositivos::find($id);

        $evento->codpatrominal = $request->input('Codpatrimonial');
        $evento->descripcion = $request->input('Descripción');
        $evento->modelo = $request->input('Modelo');
        $evento->marca = $request->input('Marca');
        $evento->serie = $request->input('Serie');
        $evento->color = $request->input('Color');
        $evento->estado = $request->input('Estado');
        $evento->condicion = $request->input('Condicion');
        $evento->posicion = $request->input('Posicion');
        $evento->observacion = $request->input('Observacion');
        $evento->oficina_id = $request->input('Ambiente');
        // dd($evento); 
        $evento->save();

        return redirect()->route('dispositivos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispositivos $dispositivos)
    {
        //
    }
}
