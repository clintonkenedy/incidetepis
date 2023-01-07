<?php

namespace App\Http\Controllers;

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
        $tickets = Ticket::where('estado', 'En camino')->orderBy("updated_at", "DESC")->get();
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
        $reglas =[
                'dni'=> 'required|numeric|digits:8',
                'celular'=> 'required|numeric|digits:9',
                'incidencia'=> 'required',
            ];
        $validator = Validator::make($request->all(), $reglas);
        if ($validator->passes()) {
            $persona = new Persona;
            $persona->dni = $request->input('dni');
            $persona->celular = $request->input('celular');
            $persona->save();



            $ticket = new Ticket;
            $ticket->persona_id = $persona->id;
            if (strlen($request->input('otros'))>2) {
                $ticket->incidencia = $request->input('otros');
            }else {
                $ticket->incidencia = $request->input('incidencia');
            }
            $ticket->oficina_id = $request->input('oficina');
            $ticket->dispositivo_id = $request->input('pc');
//            dd($request->all());
            $ticket->save();

        }
        return redirect()->route('helpdesk');

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
        $ticket->save();


        //ENVIO WHATSAPP
        if ($request->input('estado') == 'Solucionado') {
            $msj = [
                'messaging_product' => 'whatsapp',
                'to' => '51'.$request->input('celular'),
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
                                'text' => $ticket->oficina->nombre_oficina,
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('celular'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('dni'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('incidencia'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('estado').' ✅',
                            ],
                        )],
                    )
                ]
            ];

        }
        if ($request->input('estado') == 'En camino') {
            $msj = [
                'messaging_product' => 'whatsapp',
                'to' => '51'.$request->input('celular'),
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
                                'text' => $ticket->oficina->nombre_oficina,
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('celular'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('dni'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('incidencia'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('estado').' 🏃🏻',
                            ],
                        )],
                    )
                ]
            ];

        }
        if ($request->input('estado') == 'Pendiente') {
            $msj = [
                'messaging_product' => 'whatsapp',
                'to' => '51'.$request->input('celular'),
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
                                'text' => $ticket->oficina->nombre_oficina,
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('celular'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('dni'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('incidencia'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('estado').' 🟡',
                            ],
                        )],
                    )
                ]
            ];

        }
        if ($request->input('estado') == 'Cancelado') {
            $msj = [
                'messaging_product' => 'whatsapp',
                'to' => '51'.$request->input('celular'),
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
                                'text' => $ticket->oficina->nombre_oficina,
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('celular'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('dni'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('incidencia'),
                            ],
                            [
                                'type' => 'text',
                                'text' => $request->input('estado').' ⛔️',
                            ],
                        )],
                    )
                ]
            ];

        }



        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v14.0/106655235576555/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($msj),
        CURLOPT_HTTPHEADER => array(
            env('TOKEN_API_WHATSAPP'),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return redirect()->route('tickets.pendientes');
            // return redirect()->route('helpdesk');
        //   return(json_decode($response));
        }
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
