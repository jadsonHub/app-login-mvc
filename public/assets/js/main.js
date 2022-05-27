// Example starter JavaScript for disabling form submissions if there are invalid fields

//mascaras
$(document).ready(function () {
  // $('.date').mask('00/00/0000' , {reverse: true});
  // $('.time').mask('00:00:00');
  // $('.cep').mask('00000-000');
  //  $('#telefone').mask('(00) 00000-0000');
  // $('.cpf').mask('000.000.000-00');
  // $('.money').mask('000.000.000.000,00');
  // $('#cep').mask('00000-000');
  // $("#cnpj").mask('000.000.000-00');
});

function voltar() {
  history.go(-1);
}

// $.post('/dados', function(data) {
//   $(".resultado").html(data);
// });
// $("#pesquisa").keyup(function() {
// var busca = $("#pesquisa").val();
// if (busca != '') {
//   $.post('/refresh', {
//       busca: busca
//   }, function(data) {
//       $(".resultado").html(data);
//   });
// } else {

//   $.post('/dados',
//       function(data) {
//           $(".resultado").html(data);
//       });
// }
// });

// function atualizar(){
//   $.post('/atualizar', function(data) {});
// }
// setInterval("atualizar()",180000); // intervalo de 3 min
// $(function(){
//   atualizar();
// });