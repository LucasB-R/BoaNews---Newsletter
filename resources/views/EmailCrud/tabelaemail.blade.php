<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>E-Mail:</th>
            <th>Criado em:</th>
          </tr>
        </thead>
      <tbody>
            @foreach ($meusEmails as $email)
            <tr>
                <td>{{$email->email}}</td>

                <td>{{ date( 'd/m/Y' , strtotime($email->created_at))}}
                               às
                    {{ date( 'H:i' , strtotime($email->created_at))}}</td>
                    
              <td>
                <a class="btn btn-danger excluirEmail" data-id="{{$email->id}}" href="#">Deletar</a>     
              </td>

            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $meusEmails->links() }}
</div>