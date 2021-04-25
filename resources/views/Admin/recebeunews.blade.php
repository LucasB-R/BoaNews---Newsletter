@extends('Admin.Layout.layout')

@section('ConteudoAdmin')

<div class="container">

    <h6 class="display-6">E-Mails enviados - {{$dadosNoticias->titulo}}</h6>
    <div class="criar">
        <a class="btn btn-danger" href="{{Route('Resumo')}}"> Voltar </a>
    </div>  

    @if (count($recebidos) < 1)
   
    Não foram enviados e-mails para esta news!
    
    @else
    
    @include('Admin.tabelarecebidos')
        
    @endif


</div>



@endsection

