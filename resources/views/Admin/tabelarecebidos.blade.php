<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Titulo:</th>
            <th>Enviado em:</th>
          </tr>
        </thead>
      <tbody>

        @foreach ($recebidos as $EmailsReceberam)

        <tr>
            <td>
                {{$EmailsReceberam->EmailRecebido->email}}
            </td>
            <td>
                {{ date( 'd/m/Y' , strtotime($EmailsReceberam->created_at))}}
                    às
                {{ date( 'H:i' , strtotime($EmailsReceberam->created_at))}}
            </td>
        </tr>

         @endforeach
      </tbody>
    </table>
    {{ $recebidos->links() }}
</div>