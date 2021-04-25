@extends('Auth.Layout.layout')

@section('ConteudoAuth')
    






<div class="meuContainer">

@if ($errors->any())
<div class="alert alert-danger m-5">
@foreach ($errors->all() as $erro)
    {{$erro}}<br>
@endforeach
</div>
@endif
 
@if (session('erroInterno'))
<div class="alert alert-danger m-5">{{session('erroInterno')}}</div>
@endif

    <div class="Form">

      <h3>BoaNews - Cadastro</h3>

<form method="POST" action="{{Route('Cadastro')}}">

    <p>Apelido</p>
    <input type="text" class="form-control shadow-none" name="apelido">
    <p>E-mail</p>
    <input type="email" class="form-control shadow-none" name="email">
    <p>Senha</p>
    <input type="password" class="form-control shadow-none" name="senha">
    <br>
    <input type="submit" class="btn btn-primary" value="Cadastrar">
    <br>
    <p>Já tem conta? <a href="{{Route('Login')}}">Clique Aqui!</a></p>

    @csrf
</form>

    </div>
</div>

@endsection