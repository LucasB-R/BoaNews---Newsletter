@extends('Auth.Layout.layout')

@section('ConteudoAuth')


<div class="meuContainer">

@if (session('sucesso'))
<div class="alert alert-success m-5">
{{session('sucesso')}}
</div>
@endif

@if (session('erro'))
<div class="alert alert-danger m-5">
{{session('erro')}}
</div>
@endif


    <div class="Form">

      <h3>BoaNews - Entrar</h3>
      <form method="POST" action="{{Route('Login')}}">

        <p>E-mail</p>
        <input type="email" class="form-control shadow-none" name="email">
        <p>Senha</p>
        <input type="password" class="form-control shadow-none" name="senha">
        <br>
        <input type="checkbox" name="lembrar"> <label>Lembrar de Mim</label>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Login">
        <br>
        <p>Não tem conta? sem problemas! <a href="{{Route('Cadastro')}}">Clique Aqui!</a></p>
    
        @csrf
      </form>


     </div>

</div>

@endsection