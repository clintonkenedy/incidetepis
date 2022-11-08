<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::all();

        return view('oficinas.index', compact('oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'oficina'=> 'required',
                'pass'=> 'required',
                'estado'=> 'required',
            ]
        );

        $input = $request->all();
        $nombre_ofi = $request->input('oficina');
        $pass = $request->input('pass');
        $estado = $request->input('estado');

        // dd($pass);

        $oficina = new Oficina;

        $oficina->nombre_oficina = $nombre_ofi;
        $oficina->estado = $estado;
        $oficina->password = $pass;


        $oficina->save();

        return redirect()->route('oficinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function show(Oficina $oficina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = Oficina::find($id);
        // dd($evento);
        return view('oficinas.edit',compact('oficina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Oficina::find($id);

        $evento->nombre_oficina = $request->input('oficina');
        $evento->password = $request->input('pass');
        $evento->estado = $request->input('estado');
        // dd($evento);
        $evento->save();

        return redirect()->route('oficinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Oficina::find($id)->delete();
        return redirect()->route('oficinas.index');
    }
}
