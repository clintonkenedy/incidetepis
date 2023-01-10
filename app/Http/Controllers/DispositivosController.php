<?php

namespace App\Http\Controllers;

use App\Models\Dispositivos;
use App\Models\Incidencia;
use App\Models\Oficina;
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
        return view('dispositivos.create');
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
                'modelo'=> 'required',
                'marca'=> 'required',
                'serie'=> 'required',
                'color'=> 'required',
                'estado'=> 'required',
                'condicion'=> 'required',
                'posicion'=> 'required',
                'observacion'=> 'required',
                'id_ofici'=> 'required',
            ]
        );

        $input = $request->all();
        $nombre_ofi = $request->input('oficina');
        $pass = $request->input('pass');
        

        $codpatri= $request->input('codpatri');
        $descripcion=$request->input('descripcion');
        $modelo=$request->input('modelo');
        $marca=$request->input('marca');
        $serie=$request->input('serie');
        $color=$request->input('color');
        $estado = $request->input('estado');
        $condicion=$request->input('condicion');
        $posicion=$request->input('posicion');
        $observacion=$request->input('observacion');
        $id_ofici=$request->input('id_ofici');

        // dd($pass);

        $dipositi = new Dispositivos();

        $dipositi->codpatrominal = $codpatri;
        $dipositi->descripcion = $descripcion;
        $dipositi->modelo = $modelo;
        $dipositi->marca = $marca;
        $dipositi->serie = $serie;
        $dipositi->color = $color;
        $dipositi->estado = $estado;
        $dipositi->condicion = $condicion;
        $dipositi->posicion = $posicion;
        $dipositi->observacion = $observacion;
        $dipositi->oficina_id = $id_ofici;

        $dipositi->save();
        return redirect()->route('dispositivos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $oficinas = Oficina::all();
        $of = $id;
        $dispositivos= Dispositivos::where('oficina_id',$id)->get();
        $incidencias = Incidencia::all();
        //dd($oficinas[0]->dispositivos);
        //dd($of);
        return view('helpdesk.pc',compact('dispositivos','of', 'oficinas','incidencias'));
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
