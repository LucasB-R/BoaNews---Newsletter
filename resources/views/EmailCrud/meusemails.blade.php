@extends('EmailCrud.Layout.layout')

@section('ConteudoEmail')


<div class="container">

@if (session('sucesso'))
<div class="alert alert-success">
{{session('sucesso')}}
</div>
@endif

    <h6 class="display-6">Seus E-Mails</h6>  

<div class="criar">
    <a class="btn btn-primary" id="copia"> Copiar em Lista </a>
    <a class="btn btn-danger" href="{{Route('Dashboard')}}"> Voltar </a>
</div>



    @if (count($meusEmails) < 1)

    <div class="box">
        <p>Você ainda não enviou news para nenhum e-mail</p>
    </div>
        
    @else 
    
        @include('EmailCrud.tabelaemail')
    
    @endif
    
</div>

<script>
    var emails = '@foreach ($meusEmails as $email){{$email->email}};@endforeach';
    var str = emails.replace(/;\s*$/, "");
    console.log(str);

    let btn = document.querySelector('#copia');
        btn.addEventListener('click', function(e) {

        let InputVirtual = document.createElement("input");
            InputVirtual.value = str;
            document.body.appendChild(InputVirtual);
            InputVirtual.select();
            document.execCommand('copy');
            document.body.removeChild(InputVirtual);
            $("#copia").text("Copiado!");

  });


</script>
    
@endsection