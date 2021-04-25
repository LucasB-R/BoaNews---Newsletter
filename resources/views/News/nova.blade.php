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

<h6 class="display-6">Nova Notícia</h6>  

<form method="POST" action="{{Route('Nova notícia')}}">

@include('News.formulario')

@csrf
</form>

</div>
@endsection