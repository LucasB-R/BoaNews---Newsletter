<input type="text" maxlength="20" class="form-control" name="titulo" placeholder="Titulo" value="{{$dadosNoticias->titulo}}">
 

<textarea class="form-control" name="noticia" placeholder="Insira o HTML da sua Noticia">{{$dadosNoticias->noticia}}</textarea>



<input class="btn btn-primary botao" type="submit" value="Editar">
<a href="{{Route('Resumo')}}" class="btn btn-danger botao">Voltar</a>