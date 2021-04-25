@extends('Admin.Layout.layout')

@section('ConteudoAdmin')

<div class="container">

@if (session('sucesso'))
<div class="alert alert-success">
{{session('sucesso')}}
</div>
@endif

@if (session('erro'))
<div class="alert alert-danger">
{{session('erro')}}
</div>
@endif

    <h6 class="display-6">Resumo</h6>  

@if (count($TodasNews) < 1)

<div class="box">
    <p>Sem Notícias na nossa plataforma!</p>
</div>

@else
    
@include('Admin.tabelaresumo')

@endif

@endsection
    