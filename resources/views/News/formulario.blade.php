<input type="text" maxlength="20" class="form-control" name="titulo" placeholder="Titulo" 
{!!Route::currentRouteName() == "Editar notícia" ? 'value="'.$dadosNoticias->titulo.'"' : '' !!}>
 
{!!Route::currentRouteName() == "Editar notícia" ? 
'<textarea class="form-control" name="noticia" placeholder="Insira o HTML da sua Noticia">'
.$dadosNoticias->noticia. '</textarea>' : 
'<textarea class="form-control" name="noticia" placeholder="Insira o HTML da sua Noticia">
</textarea>'!!} 





<input class="btn btn-primary botao" type="submit" value="{{Route::currentRouteName() == "Editar notícia" ? 'Editar' : 'Criar'}}">
<a href="{{Route('Dashboard')}}" class="btn btn-danger botao">Voltar</a>