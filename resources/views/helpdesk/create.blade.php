<!DOCTYPE html>
<html lang="en">
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
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <input type="text" id="info_inicio" class="form-control" value="" placeholder="Número de DNI">
                                </div>
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <input type="text" id="info_inicio" class="form-control" value="" placeholder="Número de Celular">
                                </div>
                                <div class="col-md-12 mb-3 mt-4 input-group-lg">
                                    <input type="password" id="info_inicio" class="form-control" value="" placeholder="Incidencia *"> <div class="col-md-12 input-group-lg">
                                </div>


                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-success btn-lg">Generar Ticket</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
