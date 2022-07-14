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

<table class="table">
    <thead>
      <tr>
        <th scope="col">Municipio</th>
        <th scope="col">Lugar</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Fotografia</th>
        <th scope="col">Editar</th>
        

        

      </tr>
    </thead>
    <tbody>
        @foreach ($sitios as $sitio)
            
       
      <tr>
        <td scope="row">{{$sitio->municipio}}</td>
        <td>{{$sitio->lugar}}</td>
        <td>{{$sitio->nombre}}</td>
        <td>{{$sitio->descripcion}}</td>
        <td>
            <div class="imagen">
                <img class="img-fluid" src="{{asset('img/'.$sitio->fotografia)}}" alt="">
            </div>
        </td>

        <td class="grid"><a href="{{route('sitio.edit', $sitio)}}" class="btn btn-secondary"><i class="far fa-edit"></i></a>

            <form action="{{route('sitio.destroy', $sitio)}}" method="POST">
                {{ csrf_field() }}
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>

        </td>

        <td><a href="{{route('sitio.show', $sitio)}}">{{$sitio->nombre}}</a></td>

      </tr>
      @endforeach
    </tbody>
  </table>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet"

href="https://cdnjs.cloudflare.com/ajax/libs/font-
awesome/5.15.3/css/all.min.css">

<style>
img {
width:100px; /* ANCHO_IMAGEN */
border:solid black 2px;
height:200px; /* ALTO_IMAGEN */
background-position:center center; /* Centrado

de imagen*/

background-repeat:no-repeat;
}
.grid{
display: grid;
grid-template-columns: 1fr 1fr;
gap: 4px;
}
.grid a,button{
width:40px;
}

</style>
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop
