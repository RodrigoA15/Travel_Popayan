@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show"
role="alert">
{{session('message')}}

<button type="button" class="close" data-dismiss="alert" aria-
label="Close">

<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Servicio</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Sitio</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($servicio as $item)
                        
                 
                  <tr>
                    <td scope="row">{{$item->servicio}}</td>
                    <td>{{$item->precio}}</td>
                    <td>{{$item->sitio_id}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
