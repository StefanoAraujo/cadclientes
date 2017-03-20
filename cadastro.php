<?php
include_once "conf/conectaBanco.php";

$acao = $_GET['acao'];
if($acao == 'insereCliente')
{
	insereCliente();
}

//$dados = $_POST;

function insereCliente()
{
	global $conexao, $dados;
	//tabela clientes
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	//tabela clientes_contato
	$logadouro = $_POST['logadouro'];
	$bairro = $_POST['bairro'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];

    $sql_tab_cli = "INSERT INTO clientes(nome, cpf) VALUES('$nome', '$cpf')";
	$ret_tab_cli = mysqli_query($conexao, $sql_tab_cli);
	
	if($ret_tab_cli == 1)
    {
    	$last_id_tab_cli = mysqli_insert_id($conexao);
		$sql_tab_cli_contato = "INSERT INTO contato_clientes(logadouro, bairro, email, celular, id_clientes) VALUES('$logadouro', '$bairro', '$email', '$celular', $last_id_tab_cli)";
		$ret_tab_cli_contato = mysqli_query($conexao, $sql_tab_cli_contato);
    	error_log("sql_tab_cli = " .$sql_tab_cli_contato);
        error_log("ret_tab_cli_contato = " .$ret_tab_cli_contato);

    	if( $ret_tab_cli_contato == 1 )
    	echo 1;
    	else
    		echo 0;
    }	
}

?>