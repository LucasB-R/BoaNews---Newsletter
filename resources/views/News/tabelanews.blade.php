<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Titulo:</th>
            <th>Criada em:</th>
          </tr>
        </thead>
      <tbody>
            @foreach ($VerNoticias as $noticias)
            <tr>
                <td>{{$noticias->titulo}}</td>

                <td>{{ date( 'd/m/Y' , strtotime($noticias->created_at))}}
                               às
                    {{ date( 'H:i' , strtotime($noticias->created_at))}}</td>


              <td>
                <a class="btn btn-info" href="{{Route('Notícias Recebidas', ['id' => $noticias->id])}}">Histórico Enviados</a>       
              </td>

              <td>
                <a class="btn btn-info" href="{{Route('Enviar notícia 1', ['id' => $noticias->id])}}">Enviar Newsletter</a>       
              </td>

              <td>
                <a class="btn btn-primary" href="{{Route('Editar notícia', ['id' => $noticias->id])}}">Editar Notícia</a>       
              </td>

              <td>
                <a class="excluir btn btn-danger" data-id="{{$noticias->id}}" href="#">Deletar Notícia</a>     
              </td>

            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $VerNoticias->links() }}
</div>