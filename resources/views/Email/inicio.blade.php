<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>BoaNews - Envio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/css/enviaemail.css')}}"  rel="stylesheet">
</head>

<body>
	
	<div class="container">

        <div class="voltar">
            <a class="btn btn-danger" href="{{Route('Dashboard')}}">Voltar</a>
        </div>

        <h3 class="display-6">Envio de Newsletter | Notícia: {{$dadosNoticias->titulo}}</h3>
        
        <div class="row">

            <div class="card col-7 col-md-9">
                <div class="card-body">

                  <textarea type="text" id="lista" 
                    placeholder="Insira sua Lista, Ex: exemplo1@gmail.com;exemplo2@gmail.com" 
                    class="form-control"></textarea>

                  <button class="btn btn-primary envio" data-id="{{$id}}" >Enviar</button>
                </div>
            </div>
        
            <div class="card col-5 col-md-3">
                <div class="card-body">

                    <h5 class="card-title">Info:</h5>
                    <span>Total:</span>
                    <span id="carregadas" class="badge bg-dark">0</span>
                    <br>
                    <span>Em Fila:</span>
                    <span id="total" class="badge bg-info">0</span>
                    <br><br>

                    <span><i class="far fa-check-circle"></i></span>
                    <span id="enviados" class="badge bg-success">0</span>
                    <br>
                    <span><i class="fas fa-exclamation-circle"></i></span>
                    <span id="erros" class="badge bg-danger"> 0</span>
 
                </div>
            </div>
            
        </div>


        <div class="card espaco">

            <div class="caixabotao">
               <button id="mostrar1" class="btn btn-primary">Mostrar/Esconder</button>
            </div>
        
            <div class="card-body">
              <h6 style="font-weight: bold;" class="card-title">Enviados </h6>
            </div>

            <div id="mostraEnvios" class="card-body">
                <span id="listaEnviados" class="enviados"></span>
            </div>

        </div>
        
        
        <div class="card espaco">

            <div class="caixabotao">
              <button id="mostrar2" class="btn btn-primary">Mostrar/Esconder</button>
            </div>
        
            <div class="card-body">
               <h6 style="font-weight: bold;" class="card-title">Erros</h6>
            </div>

            <div id="mostraErros" class="card-body">
                <span id="listaErros" class="erros"></span>
            </div>

        </div>


</div>

<script src="https://kit.fontawesome.com/b9d593d845.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{asset('assets/js/extras.js')}}"></script>
<script src="{{asset('assets/js/enviaEmail.js')}}"></script>
</body>
</html>