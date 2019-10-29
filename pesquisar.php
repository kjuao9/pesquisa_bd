<?php

require_once('BD.php');

$nome = $_POST['nome'];
$con = new BD();
$dados = $con->pesquisarDados($nome);
header("Content-type: text/html; charset=utf-8");
echo json_encode($dados)

?>