<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Titulo:</th>
            <th>Criada em:</th>
            <th>Criador Apelido</th>
            <th>Criador E-Mail</th>
          </tr>
        </thead>
      <tbody>
            @foreach ($TodasNews as $noticias)
            <tr>
             <td>{{$noticias->titulo}}</td>

             <td>{{ date( 'd/m/Y' , strtotime($noticias->created_at))}}
                               às
                    {{ date( 'H:i' , strtotime($noticias->created_at))}}
             </td>


              <td>
                {{$noticias->autor->apelido}}
              </td>

              <td>
                {{$noticias->autor->email}}
              </td>

              <td>
                <a class="btn btn-info" href="{{Route('Gerenciamento - Notícias Recebidas', ['id' => $noticias->id])}}">Enviados</a>       
              </td>

              <td>
                <a class="btn btn-primary" href="{{Route('Gerenciamento - Editar notícia', ['id' => $noticias->id])}}">Editar</a>       
              </td>

              <td>
                <a class="btn btn-danger" href="{{Route('Gerenciamento - Deletar notícia', ['id' => $noticias->id])}}">Deletar</a>       
              </td>



            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $TodasNews->links() }}
</div>