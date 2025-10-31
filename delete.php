<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['login']) || !isset($_SESSION['senha']) || !isset($_SESSION['permissoes'])) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['permissoes']);
    header("Location: page_login.php");
    exit();
}

if ($_SESSION['permissoes'] != 2) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conexao->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso.";
    } else {
        echo "Erro ao excluir usuário: " . $conexao->error;
    }
    header("Location: master.php");
    exit();
} else {
    echo "ID inválido.";
}
?>
