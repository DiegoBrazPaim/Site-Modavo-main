<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
    include_once('conexao.php');
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['permissoes']);
        header('Location: page_login.php');
    } else {
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['permissoes'] = $user_data['permissoes'];
        $_SESSION['id'] = $user_data['id'];
        $_SESSION['data_nascimento'] = $user_data['data_nascimento'];
        $_SESSION['cep'] = $user_data['cep'];
        $_SESSION['nome_materno'] = $user_data['nome_materno'];
        header('Location: pergunta.php');
    }
    $perm = $_SESSION['permissoes'];
}
?>