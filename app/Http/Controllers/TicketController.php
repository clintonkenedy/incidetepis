<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Ticket;
use App\Models\Oficina;
use App\Models\Persona;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::all();
        return view('helpdesk.home', compact('oficinas'));
    }

    public function ticketsPendientes()
    {
        dd('pendiente');
        return view('helpdesk.home');
    }
    public function ticketsSolucionado()
    {
        dd('solucionado');
        return view('helpdesk.home');
    }
    public function ticketsCancelado()
    {
        dd('cancelado');
        return view('helpdesk.home');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function passOfi(Request $request)
    {

        $request->validate(
            [
                'oficina'=> 'required',
                'password'=> 'required',
            ]
        );
        // dd($request->all());
        $incidencias = Incidencia::all();
        $oficina = $request->input('oficina');

        $pass_oficina = Oficina::where('id', $oficina)->value('password');

        // dd($pass_oficina);

        if ($pass_oficina !== $request->input('password')) {
            return 'ta mal';
        }

        return view('helpdesk.create', compact('oficina', 'incidencias'));
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $persona = new Persona;
        $persona->dni = $request->input('dni');
        $persona->celular = $request->input('celular');
        $persona->save();

        $ticket = new Ticket;
        $ticket->persona_id = $persona->id;
        $ticket->incidencia = $request->input('incidencia');
        $ticket->oficina_id = $request->input('oficina');

        $ticket->save();

        return redirect()->route('helpdesk');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
