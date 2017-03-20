$(document).ready(function() {
    /*disable non active tabs*/
    $('.nav li').not('.active').addClass('disabled');
    $('.nav li').not('.active').find('a').removeAttr("data-toggle");

    $('button.next').click(function(){
          $('#prox_dados_gerais').click(function(){
             var nome = $('#nome').val();
             var cpf = $('#cpf').val();
             if(nome == '' || cpf == ''){
               $("#mensagem").show();
               $("#mensagem").html("Algum campo da aba dados gerais estão em branco!");
             }
             else{
               /*enable next tab*/
               $('.nav li.active').next('li').removeClass('disabled');
               $('.nav li.active').next('li').find('a').attr("data-toggle","tab").trigger("click");
             }

          });

          $('#prox_dados_endereco').click(function(){
             var logadouro = $('#logadouro').val();
             var bairro = $('#bairro').val();
             if(logadouro == '' || bairro == ''){
               $("#mensagem").show();
               $("#mensagem").html("Algum campo da aba dados endereço estão em branco!");
             }
             else{
               /*enable next tab*/
               $('.nav li.active').next('li').removeClass('disabled');
               $('.nav li.active').next('li').find('a').attr("data-toggle","tab").trigger("click");
             }

          });

        
    });

    $('button.prev').click(function() {
        $('.nav li.active').prev('li').find('a').trigger("click");
    });
});


$(document).ready(function(){
  $("#form_cadastro").submit(function(){
      var dados = $(this).serialize();

      $.ajax({
          url: "cadastro.php?acao=insereCliente",
          type: "POST",
          data: dados,
          
          error: function(XMLHttpRequest, textStatus, errorThrown){
          	$("#erro").html("houve algum problema!");
          },
          success: function(retorno){
          	 if(retorno == 1){
                //alert("retorno = " +retorno);
                $("#mensagem").show();
                $("#mensagem").html("Cliente cadastrado com sucesso");
                $("#form_cadastro input").val(""); //limpa todos inputs do formulário
                $("#form_cadastro input[type = submit]").val("Cadastrar"); //redefine botão submit
             }
          	 	
          	 else{
                //alert("retorno = " +retorno);
                $("#mensagem").show();
                $("#mensagem").html("Houve algum problema no cadastro!");
             }
          	 	
          }
      });
      return false;
  	});
});