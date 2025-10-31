<?php 

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'db_biblioteca';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conexao ->connect_errno)
{
    echo "Erro";
}
else {
    echo "Sucesso";
}

?>