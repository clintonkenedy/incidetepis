@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>CREAR DISPOSITIVO</h1>
</center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark">NUEVO DISPOSITIVO</h4>
                    <div class="card-body">
                        {!! Form::open(array('route'=>'dispositivo.store','method'=>'POST','class'=>'mt-2')) !!}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="codpatri" class="form-label">
                                    Codigo Patrimonial
                                <span style="color: red;">*</span>
                                </label>
                                {!! Form::text('codpatri', null,array('class'=>'form-control '.($errors->has('codpatri') ? 'is-invalid':''))) !!}
                                @error('codpatri')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="descripcion" class="form-label">
                                    Descripción:
                                    <span style="color: red;">*</span></label>
                                {!! Form::text('descripcion', null,array('class'=>'form-control '.($errors->has('descripcion') ? 'is-invalid':''))) !!}
                                @error('descripcion')
                            <span class="invalid-feedback">
                                <strong> {{$message}} </strong>
                            </span>
                            @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                <span style="color: red;">*</span>
                                </label>

                                {{Form::select('estado', ['Incidencia' => 'Incidencia', 'Funcional' => ,'Suspendido'], null, ['class'=>'form-select']);}}
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="../oficina" class="btn btn-danger">Cancelar</a>
                        </center>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop






