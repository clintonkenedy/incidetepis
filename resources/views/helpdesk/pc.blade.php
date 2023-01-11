<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MPP - Mesa de Ayuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
</head>
<body>
<div class="container-fluid">
    <div class="row bg bg-dark text-white">
        <a class="navbar-brand m-2">UNA PUNO</a>
    </div>

    <div class="row" style="background-color: #43baca48">
        <div class="col-md-12 m-3">
            <center>
                <h3 class=""> <i class="bi bi-phone-fill"></i>  Registrar Incidencia</h3>
            </center>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="card border-light mt-5">
                <div class="card text-dark">



                    {{-- <h4 id="" class="card-header">EVENTO </h4> --}}
{{--                    @foreach($oficinas as $oficina)--}}
{{--                        <p>{{$oficina->nombre_oficina}}</p>--}}
{{--                    @endforeach--}}

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-10 mb-3 mt-4">
                                        <select type="text" id="info_oficina" name="oficinaid" class="js-select2 form-control" placeholder="Oficina" name="oficina">
                                            @foreach ($oficinas as $oficina)
                                                <option value="{{$oficina->id}}" {{($oficina->id==$of)?"selected":""}}>{{$oficina->nombre_oficina}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class=" col-md-2 mt-4">
                                        <a href="{{route('helpdesk')}}" class="btn btn-secondary" >Cancelar</a>
                                    </div>
                                </div>


                                <div class="intro">
    {{--
                                        <p>{{ Request::route()->getName() }}</p>
    --}}
                                    {{--<p>{{ Request::path() }}
                                    </p>--}}
                                    <h1>LABORATORIO {{$of}}</h1>



                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('ticket.store')}}" method="post" id="nuevoticket1">
                                        @csrf
                                    <div class="modal-body">


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" readonly  class="form-control" name="oficina" id="oficina"  >
                                                    <label for="oficina">Laboratorio:</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" readonly class="form-control" name="pc" id="pc" >
                                                    <label for="pc">Computadora:</label>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 mb-3 mt-4 ">
                                                {{--                                    <input type="text" id="" class="form-control" value="" placeholder="Incidencia *" name="incidencia">--}}
                                                <select id="s_incidencia" class="form-select mb-3" aria-label="example" name="incidencia" required onchange="f_otros()">
                                                    <option id="limpi" selected value>Seleccione Incidencia</option>
                                                    @foreach ($incidencias as $incidencia)
                                                        <option value="{{$incidencia->nombre}}">{{$incidencia->nombre}}</option>
                                                    @endforeach
                                                </select>

                                                <div id="errorIncidencia" style="color: #dc3545">

                                                </div>
                                                <input type="text" id="otros" class="form-control" value="" placeholder="Decriba su problema" name="otros" hidden>
                                                {{--                                    <input type="hidden" name="oficina" value="{{$oficina}}">--}}
                                            </div>
                                           {{-- <div class="d-flex justify-content-end mt-3">
                                                <button class="btn btn-success ">Generar Ticket</button>
                                            </div>--}}


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" onclick="limpiar()" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button class="btn btn-success ">Generar Ticket</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4" id="paginated-list" aria-live="polite">
                            @foreach ($dispositivos as $d)
                                <div class="col-lg-2 col-md-6" >
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>PC
                                                @if($d->estado=='Funcional')
                                                <span class="badge bg-success">{{$d->estado}}</span>
                                                @elseif($d->estado=='Incidencia')
                                                    <span class="badge bg-warning ">{{$d->estado}}</span>
                                                @elseif($d->estado=='Suspendido')
                                                    <span class="badge bg-danger ">{{$d->estado}}</span>
                                                @elseif($d->estado=='Inactivo')
                                                    <span class="badge bg-dark ">{{$d->estado}}</span>
                                                @endif

                                            </h5>

                                        </div>
                                        <div class="card-body">
                                            <center>
                                                <h5 class="card-title">{{$d->posicion}}</h5>
                                                @if($d->estado!='Funcional')
                                                    <p>{{$d->tickets->last()->incidencia}}</p>
                                                @else
                                                    <button type="button" onclick="enviar2(this,{{$d->id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Incidencia
                                                    </button>
                                                @endif

{{--                                                <a value="{{$d->id}}" onclick="enviar2(this,{{$d->id}})" href="#" data-bs-toggle="modal" ata-bs-target="#exampleModal" class="btn btn-primary">incidencia</a>--}}

                                            </center>

                                        </div>
                                    </div>
                                    <div class="service">

                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    let oficina = {{$of}};
    let pc;
    document.getElementById('oficina').value = oficina;
    function limpiar(){
        console.log("limpiar");

        window.location.href ={{$of}};
    }
    let inci = document.querySelector('#inci');
    // Obtener una referencia al elemento select
    const select = document.querySelector('#info_oficina');
    select.addEventListener("change", (e) => {
        console.log("ga");
        let option = e.currentTarget.selectedOptions[0];
        console.log(option.value);
        window.location.href = "/dispositivos/"+option.value;
        console.log("xd");

    });
    // Obtener una referencia a la opción que quieres modificar


    //window.location.href = "/dispositivos/2";
    function enviar2(e,i){
        console.log("hola2");
        console.log(i);
        pc = i;
        document.getElementById('pc').value = pc;

        console.log(inci);
        //ss$('#exampleModal').modal({ show:true });
        //
        //const myModalAlternative = new bootstrap.Modal('#myModal', options)
        //localStorage.setItem('pc', JSON.stringify(pc));
        //window.location.href = "/incidencia";

    }
    const f_otros = () => {
        if (document.getElementById('s_incidencia').value == "OTROS") {
            document.getElementById('otros').hidden = false;
            console.log('otros');
        }else{
            document.getElementById('otros').hidden = true;
            document.getElementById('otros').value = ""
        }
    }






    //


</script>
</body>
</html>
