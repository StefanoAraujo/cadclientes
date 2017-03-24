<?php
header('Content-Type: application/json;, charset=utf-8');
include_once "conf/conectaBanco.php";

$estado = $_GET['estado'];
error_log($estado);

$sql = "SELECT c.id, c.nome FROM cidades c INNER JOIN estados e ON (c.id_estado=e.id) 
		WHERE c.id_estado = $estado ORDER BY c.nome";

$query = mysqli_query($conexao, $sql);

while($linha = mysqli_fetch_assoc($query))
{
    $cidades[] = array(
    			 'id' => $linha['id'],
    			 'nome' => ($linha['nome'])
    			 );  
}

echo json_encode($cidades);


?>