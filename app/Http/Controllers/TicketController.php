<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Incidencia;
use App\Models\Ticket;
use App\Models\Oficina;
use App\Models\Persona;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $messages = [ //Personalizar mensajes
    //     'dni.numeric' => "Debe ser número",
    // ];
    public function index()
    {
        $oficinas = Oficina::all()->where('estado', '0');
        return view('helpdesk.home', compact('oficinas'));
    }

    public function incidencia()
    {
        $incidencias = Incidencia::all();
        return view('helpdesk.create', compact('incidencias'));
    }

    public function ticketsPendientes()
    {
        $tickets = Ticket::where('estado', 'Pendiente')->orderBy("updated_at", "DESC")->get();
        return view('tickets.pendientes', compact('tickets'));
    }
    public function ticketsSolucionado()
    {
//        dd('solucionado');
        $tickets = Ticket::where('estado', 'Solucionado')->orderBy("updated_at", "DESC")->get();
        return view('tickets.solucionados', compact('tickets'));
    }
    public function ticketsCancelado()
    {
        $tickets = Ticket::where('estado', 'Cancelado')->orderBy("updated_at", "DESC")->get();
        return view('tickets.cancelados', compact('tickets'));
    }
    public function ticketsCamino()
    {
        $tickets = Ticket::where('estado', 'Inactivo')->orderBy("updated_at", "DESC")->get();
        return view('tickets.camino', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofi = 'ALCALDIA';
        $cel= '987654321';
        $dni = '12345678';
        $inci = 'PROBLEMAS CON MI PC';
        $estado = 'PENDIENTE';

        $datds = [
            'messaging_product' => 'whatsapp',
            'to' => '51934077277',
            'type' => 'template',
            'template' => [
                'name' => 'incidencia',
                'language' => [
                    'code' => 'es'
                ],
                'components' => array(
                    ['type' => 'body',
                    'parameters' => array(
                        [
                            'type' => 'text',
                            'text' => 'asd',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'asd',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'xd',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'dasd',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'asd'
                        ],
                    )],
                )
            ]
        ];

        return json_encode($datds);
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

        $msj = [
            'status' => 'error',
            'msj' => "Contraseña Incorrecta, comunicarse con el encargado de la oficina."
        ];


        if ($pass_oficina !== $request->input('password')) {
            return json_encode([
                'status' => 'error',
                'msj' => 'Contraseña Incorrecta',
            ]);
        }
        // return redirect()->route('helpdesk.create', compact('oficina', 'incidencias'));
        return view('helpdesk.create', compact('oficina', 'incidencias'));
    }
    public function store(Request $request)
    {

        // dd($request->all());
        // return json_encode([
        //     'status' => 'ok',
        //     'msj' => 'holi',
        // ]);
        //dd($request->all());
        $reglas =[

                'incidencia'=> 'required',
            ];
        $validator = Validator::make($request->all(), $reglas);
        if ($validator->passes()) {
            /*$persona = new Persona;
            $persona->dni = $request->input('dni');
            $persona->celular = $request->input('celular');
            $persona->save();*/



            $ticket = new Ticket;
            //$ticket->persona_id = $persona->id;
            $ticket->persona_id = 1;
            if (strlen($request->input('otros'))>2) {
                $ticket->incidencia = $request->input('otros');
            }else {
                $ticket->incidencia = $request->input('incidencia');
            }
            $ticket->oficina_id = $request->input('oficina');
            $ticket->dispositivo_id = $request->input('pc');
//            dd($request->all());
            $ticket->save();
            $dispositivo = Dispositivo::find($request->input('pc'));
            $dispositivo->estado = 'Incidencia';
            $dispositivo->save();
            //dd($dispositivo);

        }
        return redirect()->route('dispositivos.show',$request->input('oficina'));

//        return response()->json([
//            'status' => 'error',
//            'message' => $validator->errors()
//        ]);
        // if ($request->input('incidencia') == '0') {
        //     return;
        // }
//        dd($request->all());


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
    public function edit($id)
    {
        $ticket = Ticket::find($id);
//        dd($ticket);
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->persona->dni = $request->input('dni');
        $ticket->persona->celular = $request->input('celular');
        $ticket->incidencia = $request->input('incidencia');
        $ticket->oficina->nombre_oficina = $request->input('oficina');
        $ticket->estado = $request->input('estado');
//        dd($ticket->dispositivo->id);
        $ticket->save();
        if($request->input('estado')=='Solucionado'){
            $ticket->dispositivo->estado='Funcional';
        }
        else if($request->input('estado')=='Cancelado'){
            $ticket->dispositivo->estado='Suspendido';
        }
        $ticket->dispositivo->save();


        return redirect()->route('tickets.pendientes');
            // return redirect()->route('helpdesk');
        //   return(json_decode($response));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::find($id)->delete();

        return back()->withInput();
    }
}
