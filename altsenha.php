<?php 

    include_once('conexao.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $senha = $_POST['senha'];
        $conf_senha = $_POST['conf_senha'];

        $sqlUpdate = "UPDATE usuarios SET senha='$senha', conf_senha='$conf_senha' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    } 
    header('Location: index.php');

?>
