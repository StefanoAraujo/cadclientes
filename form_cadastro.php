<?php
	session_start();
	/* Controlar abas*/
	if(!isset($_SESSION['control_aba'])){
		$_SESSION['control_aba'] = 0;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Formulário de cadastro com abas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="jogo de adivinhação">
    <meta name="author" content="Reginaldo">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/form_cadastro.js"> </script>
</head>
<body>

 <h2>Cadastro de Clientes </h2>
 <div class="container theme-showcase" role="main">
   <div class="row espaco">
	  <div class="pull-right">
    	<a href="form_cadastro.php">
    	   <button type='button' class='btn btn-sm btn-success'>Novo Usuário</button></a>
	  </div>
   </div>
 </div>

 <form id="form_cadastro" action="" method="">
   <!-- Nav tabs -->
   <ul class="nav nav-pills">
	 <li class="active">
		<a href="#dados_gerais" data-toggle="tab">Dados Gerais</a>
	 </li>
	 <li>
		<a href="#dados_endereco" data-toggle="tab">Dado Endereço</a>
	 </li>
	 <li>
		<a href="#dados_contato" aria-controls="dados_contato" role="tab" data-toggle="tab">Dados Contato</a>
	 </li>
  </ul> 

  <!-- Tab panes -->
    <div class="tab-content">
		<div class='tab-pane active' id="dados_gerais"> 
		   <div style="padding-top:20px;">
		      <div class="form-group">
                  <label class="col-sm-2 control-label">Nome:</label>
                      <div class="col-sm-10">
                          <input type="text" name='nome' class="form-control" id="nome" name="nome"  placeholder="Nome Completo" required>
                      </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">CPF:</label>
                      <div class="col-sm-10">
                          <input type="number" class="form-control" id="cpf" 
                          name="cpf" required placeholder="CPF" required>
                      </div>
              </div>
              <button class="next" id="prox_dados_gerais">Próximo </button>
		   </div>
		</div>

		<div class='tab-pane disable' id="dados_endereco"> 
		   <div style="padding-top:20px;">
		      <div class="form-group">
                  <label class="col-sm-2 control-label">Logadouro:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="logadouro" name="logadouro" placeholder="Logadouro" required>
                      </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Bairro:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="bairro" 
                          name="bairro" placeholder="Bairro" required>
                      </div>
              </div>
              <button class="next" id="prox_dados_endereco">Próximo </button>
		   </div>
		</div>

		<div class='tab-pane disable' id="dados_contato"> 
		   <div style="padding-top:20px;">
		      <div class="form-group">
                  <label class="col-sm-2 control-label">E-mail:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required>
                      </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Celular:</label>
                      <div class="col-sm-10">
                          <input type="number" class="form-control" id="celular" 
                          name="celular" placeholder="Número Celular" required>
                      </div>
              </div>
		   </div>
		   <div class="tab-pane" id="messages">
                  <button class="prev">Anterior</button>
                  <button type="submit" class="save">Cadastrar</button>
           </div>
		</div>
	</div>
 </form>

    <div id="mensagem" style="display: none"> 
    </div>

    <div id="erro">
    </div>

  <br /> <br />
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h2>Listagem de clientes </h2></div>
    
    <!-- Table -->
    <table class="table">
       <tr>
         <th>Nome</th>
         <th>CPF</th>
         <th>Logadouro</th>
         <th>Bairro</th>
         <th>E-mail</th>
         <th>Celular</th>
       <tr>
        
       <?php 
       include_once "conf/conectaBanco.php";
       $sql_list = "SELECT c1.id, nome, cpf, logadouro, bairro, email, celular FROM clientes c1 
                   INNER JOIN contato_clientes c2 ON (c1.id = c2.id_clientes) ORDER BY nome";
       $result = mysqli_query($conexao, $sql_list);
       if(mysqli_num_rows($result) == 0)
       	 echo "<center>Ainda não tem nenhum cadastro.</center>";
       else
       {
       	   while($linha = mysqli_fetch_assoc($result))
       	   {
       	          echo "<tr> <td> {$linha['nome']} </td>
       	    		   <td> {$linha['cpf']} </td>
       	    		   <td>{$linha['logadouro']} </td>
       	    		   <td>{$linha['bairro']} </td>
       	    		   <td>{$linha['email']} </td>
       	    		   <td> {$linha['celular']} </td>";
           }	
       }
       ?>
    </table>
  </div>
</body>
</html>