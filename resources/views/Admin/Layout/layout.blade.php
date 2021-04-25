<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoaNews - {{Route::getCurrentRoute()->getName()}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/formulario.css')}}" rel="stylesheet" >
</head>
<body>
    
@yield('ConteudoAdmin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{asset('assets/js/sweetalert.js')}}" ></script>
<script src="{{asset('assets/js/confirmacao.js')}}" ></script>
<script src="{{asset('assets/js/escondeAlerta.js')}}" ></script>
</body>
</html>