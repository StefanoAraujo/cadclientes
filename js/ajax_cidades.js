$(document).ready(function(){
	$("#estados").change(function(){
        var estado = $("#estados option:selected").val();
        //alert(estado);
        
        if(estado != '')
        {
        	$.ajax({
                type: "GET",
                url: "consulta_cidades.php?estado="+estado,
                //data: "estado="+estado,
                dataType: "json",

          error: function(XMLHttpRequest, textStatus, errorThrown){
          	$("#erro").html("houve algum problema!");
          },
          success: function(cidades){
          		var options = '';
                for(var i=0; i<cidades.length; i++)
                {
                	options += '<option value="' +cidades[i].id+ '">' +cidades[i].nome+ '</option>';
                }
                $("#cidades").html(options);
            }
          });
        }
        else
        {
        	$("#cidades").html('<option value=""> Seleciona um estado </option>');

        }
        return false;
     });
  });

            