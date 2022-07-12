@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


    <div class="container">
        <center>
            <h1>Registro de Servicios</h1>
        </center>
        <form action="{{ route('servicio.store') }}" method="post">
            {{ csrf_field() }}


            <label for="">Nombre Servicio</label>
            <input type="text" name="servicio" class="form-control">
            <small class="text-danger"> {{ $errors->first('servicio') }}</small>

            <label for="">Precio</label>
            <input type="number" name="precio" class="form-control">
            <small class="text-danger">{{ $errors->first('precio') }}</small>

            <label for="">Sitio</label>
            <select name="sitio_id" class="form-control">
                <option selected="true" disabled="disabled">Seleccione un sitio</option>
                @foreach ($sitios as $sitio)
                    <option value="{{ $sitio->id }}">{{ $sitio->nombre }}</option>
                @endforeach
            </select>

            <small class="text-danger">{{ $errors->first('sitio') }}</small>

            <div class="col-md-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

        </form>

  

    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
