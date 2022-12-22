<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Desk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- SELECT2 --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript"></script>
    <style>
        .select2 {
            width:100%!important;
        }

    </style>
  </head>
  <body>


    <div class="container-fluid">
        <div class="row bg bg-dark text-white">
            <a class="navbar-brand m-2">Muni Puno</a>
        </div>
        <div class="row text-white" style="background-color: #1e6584">
            <div class="col-md-12 pt-5">
                <center>
                    <h1> <b>Municipalidad Provincial de Puno</b></h1>
                    <hr/>
                    <h5>Oficina de Tecnología Informática</h5>
                    <p>Teléfono: 051 368591 - Anexo: 4010</p>
                </center>
            </div>
        </div>
        <div class="row" style="background-color: #43baca48">
            <div class="col-md-12 m-3">
                <center>
                    <h3 class=""> <i class="bi bi-phone-fill"></i>   Mesa de Ayuda</h3>
                </center>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="card border-light mt-5">
                    <div class="card text-dark">
                        {{-- <h4 id="" class="card-header">EVENTO </h4> --}}
                        <div class="card-body">
                            @if(session('info'))
                                <div class="alert alert-success">
                                    <strong>{{session('info')}}</strong>
                                </div>

                            @endif
                            <div class="row m-3">
                                <div class="col-12">
                                    <center>
                                        <h3>Registro de Incidencia</h3>
                                    </center>
                                </div>
                                <form action="{{route('ticket.passOfi')}}" method="get" id="nuevoticket1">
                                @csrf
                                <div class="col-md-12 mb-3 mt-4">
                                    <select type="text" id="info_oficina" class="js-select2 form-control" placeholder="Oficina" name="oficina">
                                    @foreach ($oficinas as $oficina)
                                        <option value="{{$oficina->id}}">{{$oficina->nombre_oficina}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 input-group-md">
                                    <input type="password" id="passoficina" class="form-control" value="" placeholder="Contraseña *" name="password">
                                    @if(session('ercontra'))
                                            <small style="color: red">{{session('ercontra')}}</small>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-success btn-lg">Enviar Solicitud</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").first().hide().slideDown(500).delay(3000).slideUp(500, function () {
                $(this).remove();
            });
        });
            $(document).ready(function() {
                $('.js-select2').select2({
                    language: "es",
                });
            });
    </script>
</body>

</html>
