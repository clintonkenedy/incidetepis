<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
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
            <div class="col-md-6">
                <div class="card border-light mt-5">
                    <div class="card text-dark">
                        {{-- <h4 id="" class="card-header">EVENTO </h4> --}}
                        <div class="card-body">
                            <div class="row m-3">
                                <div class="col-12">
                                    <center>
                                        <h3>Solicitud de Atención</h3>
                                    </center>
                                </div>
                                {{-- {{-- <div class="col-md-6 mb-3">
                                    <label for="fecha" class="form-label">
                                        <b>Fecha</b>
                                        <span style="color: red;">*</span></label>
                                        <input type="date" id="info_fecha" class="form-control" value="" readonly>
                                </div> --}}

                                <form action="{{route('ticket.store')}}" method="post" id="nuevoticket1">
                                    @csrf

                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <input type="text" id="dni" class="form-control" value="" placeholder="Número de DNI" name="dni" onkeyup="validarDNI()">
                                    <div id="messageDNI" class="invalid-feedback" hidden>
                                        DNI Incorrecto
                                    </div>
                                    <div id="errorDNI" style="color: #dc3545">

                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <input type="text" id="celular" class="form-control" value="" placeholder="Número de Celular" name="celular" onkeyup="validarCel()">
                                    <div id="messageCelular" class="invalid-feedback" hidden>
                                        Celular Incorrecto
                                    </div>
                                    <div id="errorCelular" style="color: #dc3545">

                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
{{--                                    <input type="text" id="" class="form-control" value="" placeholder="Incidencia *" name="incidencia">--}}
                                    <select id="s_incidencia" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="incidencia" onchange="f_otros()">
                                        <option selected value>Seleccione Incidencia</option>
                                        @foreach ($incidencias as $incidencia)
                                            <option value="{{$incidencia->nombre}}">{{$incidencia->nombre}}</option>
                                        @endforeach
                                    </select>

                                    <div id="errorIncidencia" style="color: #dc3545">

                                    </div>
                                    <input type="text" id="otros" class="form-control" value="" placeholder="Decriba su problema" name="otros" hidden>
                                    <input type="hidden" name="oficina" value="{{$oficina}}">
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-success btn-lg">Generar Ticket</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const f_otros = () => {
            if (document.getElementById('s_incidencia').value == "OTROS") {
                document.getElementById('otros').hidden = false;
                console.log('otros');
            }else{
                document.getElementById('otros').hidden = true;
                document.getElementById('otros').value = ""
            }
        }



        function validarDNI() {
            let isValid = false;
            const tmaximo = 8;
            const input = document.forms['nuevoticket1']['dni'];
            const message = document.getElementById('messageDNI');
            input.willValidate = false;
            const pattern = new RegExp('^[0-9 ]*$');


            input.classList.add('is-invalid');
            if(input.value) {
                if(pattern.test(input.value)){
                    isValid = true;
                    input.classList.remove('is-invalid')
                }
            }
            input.addEventListener('input',function(){

                if (this.value.length > tmaximo){
                    this.value = this.value.slice(0,tmaximo);
                }
                if (this.value.length == tmaximo){
                    // input.classList.replace('is-invalid','is-valid' )
                    input.classList.add('is-valid');
                }else{
                    input.classList.remove('is-valid');
                }
            })
            //Pinta input
            if(!isValid) {
                // input.classList.add('was-validated')
                input.classList.replace('is-valid','is-invalid' )
                message.hidden = false;
            } else {
                // input.style.borderColor = 'green';
                // input.classList.replace('is-invalid','is-valid' )
                message.hidden = true;
            }

            return isValid;
        }
        function validarCel() {
            let isValid = false;
            const tmaximo = 9;
            const input = document.forms['nuevoticket1']['celular'];
            const message = document.getElementById('messageCelular');
            input.willValidate = false;
            const pattern = new RegExp('^[0-9 ]*$');


            input.classList.add('is-invalid');
            if(input.value) {
                if(pattern.test(input.value)){
                    isValid = true;
                    input.classList.remove('is-invalid')
                }
            }
            input.addEventListener('input',function(){

                if (this.value.length > tmaximo){
                    this.value = this.value.slice(0,tmaximo);
                }
                if (this.value.length == tmaximo){
                    // input.classList.replace('is-invalid','is-valid' )
                    input.classList.add('is-valid');
                }else{
                    input.classList.remove('is-valid');
                }
            })
            //Pinta input
            if(!isValid) {
                // input.classList.add('was-validated')
                input.classList.replace('is-valid','is-invalid' )
                message.hidden = false;
            } else {
                // input.style.borderColor = 'green';
                // input.classList.replace('is-invalid','is-valid' )
                message.hidden = true;
            }

            return isValid;
        }

        //
        try {
            document.getElementById("nuevoticket1").addEventListener("submit", function(event){
                event.preventDefault();
                // console.log(total_tickets());
                (async () => {
                    const rawResponse = await fetch('/nuevoticket', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    body: JSON.stringify({
                        dni: document.forms['nuevoticket1']['dni'].value,
                        celular: document.forms['nuevoticket1']['celular'].value,
                        incidencia: document.forms['nuevoticket1']['incidencia'].value,
                        oficina: document.forms['nuevoticket1']['oficina'].value,
                        otros: document.forms['nuevoticket1']['otros'].value,
                    })
                });

                    const content = await rawResponse.json();
                    if (content.message?.dni) {
                        document.getElementById('errorDNI').hidden = false;
                        document.getElementById('errorDNI').innerHTML = content.message.dni;
                    }else{
                        document.getElementById('errorDNI').hidden = true;
                    }

                    if (content.message?.celular) {
                        document.getElementById('errorCelular').hidden = false;
                        document.getElementById('errorCelular').innerHTML = content.message.celular;
                    }else{
                        document.getElementById('errorCelular').hidden = true;
                    }

                    if (content.message?.incidencia) {
                        document.getElementById('errorIncidencia').hidden = false;
                        document.getElementById('errorIncidencia').innerHTML = content.message.incidencia;
                    }else{
                        document.getElementById('errorIncidencia').hidden = true;
                    }
                    console.log(content.message);
                    if (content.status == 'saved') {
                        // Swal.fire(
                        //     'Ticket Registrado N°: '+ content.message,
                        //     'Su ticket fue registrado con existo, se procederá a atender su peticion según el orden de ingreso.',
                        //     'success'
                        // )
                        Swal.fire({
                            title: 'Ticket Registrado N°: '+ content.message,
                            icon: 'success',
                            text: 'Su ticket fue registrado con éxito, se procederá a atender su peticion según el orden de ingreso.',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.replace('/');
                            }
                        })
                    }
                })();
            });
        } catch (error) {
            console.log(error);
        }

    </script>
</body>
</html>
