<?php
session_start();
include_once('conexao.php');

$tentativaFalhou = false;
$twoFactorStatus = 'Falhou';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cep'])) {
        if ($_POST['cep'] !== $_SESSION['cep']) {
            $tentativaFalhou = true;
            $_SESSION['cepErrado'] = true;
        } else {
            $_SESSION['cepErrado'] = false;
            $twoFactorStatus = 'Sucesso';
        }
    } elseif (isset($_POST['nome_materno'])) {
        if ($_POST['nome_materno'] !== $_SESSION['nome_materno']) {
            $tentativaFalhou = true;
            $_SESSION['maeErrada'] = true;
        } else {
            $_SESSION['maeErrada'] = false;
            $twoFactorStatus = 'Sucesso';
        }
    } elseif (isset($_POST['data_nascimento'])) {
        if ($_POST['data_nascimento'] !== $_SESSION['data_nascimento']) {
            $tentativaFalhou = true;
            $_SESSION['datanErrada'] = true;
        } else {
            $_SESSION['datanascErrada'] = false;
            $twoFactorStatus = 'Sucesso';
        }
    }
    if ($tentativaFalhou) {
        $_SESSION['tentativas']++;
        if ($_SESSION['tentativas'] >= 3) {
            $_SESSION['tentativas'] = 0; // Reset tentativas
            header('Location: page_login.php');
            exit;
        }
    } else {
        $_SESSION['tentativas'] = 0; // Reset tentativas em caso de sucesso
        header('Location: index.php');
        exit;
    }

    header('Location: pergunta.php');
    exit;
}
?>