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
    public function edit(Dispositivos $dispositivos)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivos $dispositivos)
    {
        //
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
