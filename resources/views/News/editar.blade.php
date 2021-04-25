@extends('News.Layout.layout')

@section('ConteudoNews')

<div class="container">

@if ($errors->any())
<div class="alert alert-danger m-5">
@foreach ($errors->all() as $erro)
    {{$erro}}<br>
@endforeach
</div>
@endif

<h6 class="display-6">Editar Notícia</h6>  

<form method="POST" action="{{Route('Editar notícia', ['id' => $id])}}">

@include('News.formulario')

@csrf
</form>

</div>
@endsection