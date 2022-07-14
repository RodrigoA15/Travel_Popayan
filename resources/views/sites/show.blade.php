@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Sitio: {{ '' . $sitio->nombre }}</h1>
    <p>Descripcion: {{ '' . $sitio->descripcion }}</p>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->servicio }}</td>
                            <td>{{ $service->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="ml-4 mb-4 col-md-4">
                <a href="{{ route('sitio.index') }}" class="btn btn-secondary eliminar">Volver</a>

            </div>
        </div>
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
