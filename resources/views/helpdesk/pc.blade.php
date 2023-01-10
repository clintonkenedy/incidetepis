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
                                <div class="intro">
                                    <h1>LABORATORIO 0{{$oficina}}</h1>
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
                                                @endif

                                            </h5>

                                        </div>
                                        <div class="card-body">
                                            <center>
                                                <h5 class="card-title">{{$d->id}}</h5>
                                                <a value="{{$d->id}}" onclick="enviar2(this,{{$d->id}})" href="#" class="btn btn-primary">incidencia</a>

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
<script>
    function enviar2(e,i){
        console.log("hola2");
        console.log(i);
        let pc = i;
        localStorage.setItem('pc', JSON.stringify(pc));
        window.location.href = "/incidencia";

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
