<?php
include_once "conf/conectaBanco.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Carrega cidades dinamicamente por estado selecionado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="jogo de adivinhação">
    <meta name="author" content="Reginaldo">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/ajax_cidades.js"> </script>
</head>

<body>

<h2>Cidades por estado </h2>

<br />

<label>Estado: </label>
<select name="estados" id="estados">
 <option value=""> </option>
 <?php 
    $estados = mysqli_query($conexao, "SELECT id, nome, uf FROM estados ORDER BY uf");
    while($linha = mysqli_fetch_assoc($estados))
    {
    	echo '<option value="' .$linha['id']. '">' .$linha['uf']. ' -> '.$linha['nome']. '</option>';
    }
 ?>
</select>

<br />
<label>Cidade: </label>
<select name="cidades" id="cidades">
  <option value=""> Selecione um estado </option>
</select>

<div id="erro">
</div>
</body>

</html>
