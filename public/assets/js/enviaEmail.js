$(document).on('click', '.envio', function (e) {
    e.preventDefault();
    
    var emailsLista = $("#lista").val();
    var separarEmail = emailsLista.split(";");
    var total = separarEmail.length;
    var enviados = 0;
    var erros = 0;
    var fila = total;

    var id = $(this).data('id');

separarEmail.forEach(function(value, index) {

setTimeout(function() {

$.ajax({

     url: '../envio/api/'+ id +'/' + value,
     type: 'GET',
     async: true,
     success: function(resultado) {

     if (!resultado.match("ERRO")) {

     removeEmail();
     enviados++;
     fila--;
     enviou(resultado + "");
     

     }else{

     removeEmail();
     erros++;
     fila--;
     reprovou(resultado + "");

     }


     $('#carregadas').html(total);
     $('#enviados').html(enviados);
     $('#erros').html(erros);
     $('#total').html(fila);    
}  

     });

    }, 500 * index);

    });
});

    
function enviou(str) {
    $("#listaEnviados").append(str + "<br>");
}

function reprovou(str) {
    $("#listaErros").append(str + "<br>");
}

function removeEmail() {

    var linhas = $("#lista").val().split(';');
    linhas.splice(0, 1);
    $("#lista").val(linhas.join(";"));

}