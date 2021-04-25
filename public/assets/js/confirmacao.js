$(document).on('click', '.excluir', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: 'Tem Certeza?',
        dangerMode: true,
        text: 'Você está prestes a excluir essa notícia e tudo vinculado à ela!',
        icon: 'error',
        buttons: ["Cancelar", "Sim, quero excluir!"],

    }).then(function(value) {
        
        if (value) {

            window.location.href = `/noticia/deletar/${id}`;

        }

    });
});


$(document).on('click', '.excluirEmail', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: 'Tem Certeza?',
        dangerMode: true,
        text: 'Você está prestes a excluir esse e-mail!',
        icon: 'error',
        buttons: ["Cancelar", "Sim, quero excluir!"],

    }).then(function(value) {
        
        if (value) {

            window.location.href = `/emails/deletar/${id}`;

        }

    });


});