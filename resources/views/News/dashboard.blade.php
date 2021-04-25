@extends('News.Layout.layout')

@section('ConteudoNews')
    
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


<div class="criar">
      {!! 
        Auth::user()->admin ? 
       '<a class="btn btn-warning" href="'.Route('Resumo').'"> Administração </a>' 
       : ''
       !!}
</div>
    <h6 class="display-6">Suas Notícias</h6>  

    <div class="criar">
        <a class="btn btn-success" href="{{Route('Nova notícia')}}"> Nova notícia </a>
        <a class="btn btn-primary" href="{{Route('E-mails')}}"> Meus E-Mails </a>
    </div>
    
@if (count($VerNoticias) < 1)

<div class="box">
    <p>Você ainda não cadastrou nenhuma notícia</p>
</div>

    
@else 


    @include('News.tabelanews')

  

@endif


</div>
   
   


@endsection