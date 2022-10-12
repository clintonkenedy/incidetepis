<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                            <div class="row m-3">
                                <div class="col-12">
                                    <center>
                                        <h3>Registro de Incidencia</h3>
                                    </center>
                                </div>
                                <form action="{{route('ticket.passOfi')}}" method="get" id="nuevoticket1">
                                @csrf
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <select type="text" id="info_oficina" class="form-control" value="" placeholder="Oficina" name="oficina">
                                    @foreach ($oficinas as $oficina)
                                        <option value="{{$oficina->id}}">{{$oficina->nombre_oficina}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 input-group-lg">
                                    <input type="password" id="passoficina" class="form-control" value="" placeholder="Contraseña *" name="password">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        // const passofi = async (oficina) => {
        //     console.log('asd');
        // }
        // const valor =  document.getElementById('info_oficina').value;
        // const passofi = async () => {
        //     document.getElementById('info_oficina').value;
        //     const asd = await fetch('');
        // }
        // const passofi = async ( ofi ) => {
        //     // e.preventDefault();
        //     const oficina = document.getElementById('info_oficina');
        //     const passoficina = document.getElementById('passoficina');
        //     const resp = await fetch(`/nuevoticket1/${oficina.value}`);
        //     const {status, data} = await resp.json();
        //     console.log(data);
        //     //DESESTRUCTURACION DE RESPUESTA
        //
        //     if (data.password !== passoficina.value){
        //         oficina.value = '';
        //         passoficina.value = '';
        //     }
        //
        // document.getElementById("nuevoticket1").addEventListener("submit", function(event){
        //     event.preventDefault();

        //     let pass1 = document.getElementById("pass1");
        //     let pass2 = document.getElementById("pass2");

        //     pass1.value = pass1.value.trim();

        //     if (pass1.value !== pass2.value) {
        //         pass1.classList.add('is-invalid');
        //         pass2.classList.add('is-invalid');
        //         console.error('No coincide');
        //         return
        //     }
        //     console.log(document.getElementById("pass1").value);
        //     console.log(document.getElementById("pass2").value);

        //     document.getElementById("nuevoticket1").submit();
        // });
    </script>
</body>

</html>
