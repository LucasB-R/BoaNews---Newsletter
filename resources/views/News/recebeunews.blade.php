@extends('News.Layout.layout')

@section('ConteudoNews')

<div class="container">

    <h6 class="display-6">Meus E-Mails enviados - {{$dadosNoticias->titulo}}</h6>
    <div class="criar">
        <a class="btn btn-danger" href="{{Route('Dashboard')}}"> Voltar </a>
    </div>  

    @if (count($recebidos) < 1)
   
    Não foram enviados e-mails para esta news!
    
    @else
    
    @include('News.tabelarecebidos')
        
    @endif


</div>



@endsection

