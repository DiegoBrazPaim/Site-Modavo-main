<?php
session_start();
include 'conexao.php';

// Exemplo de autenticação simplificada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login'] = $row['login'];
        $_SESSION['permissoes'] = $row['permissoes'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['data_nascimento'] = $row['data_nascimento'];
        $_SESSION['cep'] = $row['cep'];
        $_SESSION['nome_materno'] = $row['nome_materno'];
        
        echo "Sessão configurada com sucesso!";
        // Redirecionar para a página de perguntas
        header('Location: pergunta.php');
        exit;
    } else {
        echo "Login ou senha inválidos!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Modavo</title>
  <link rel="stylesheet" href="../Site-Modavo-main/assets/css/style.css">

  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Favicon -->
  <link href="../Site-Modavo-main/assets/img/icons/favicontelecall.png" rel="icon">
  <link href="../Site-Modavo-main/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Site-Modavo-main/assets/css/main.css" rel="stylesheet">

  <style>
    .form-help {
      margin-top: 10px;
    }
    .margin-top {
      margin-top: 20px;
    }
  </style>

</head>

<body class="body-login">
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top bg-">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="../Site-Modavo-main/index.php" class="logo d-flex align-items-center">
        <img src="../Site-Modavo-main/assets/img/modavo.png" alt="">
      </a>
    </div>
  </header>
  <!-- End Header -->

  <div class="stars"></div>
  <div class="stars2"></div>
  <div class="form-wrapper">
    <h2>Login</h2>
    <form action="testelogin.php" method="post">

      <div class="form-controle">
        <input type="text" name="login" id="c_login" oninput="validarAcessoLogin()" required minlength="6" maxlength="6">
        <label>Digite seu login</label>
      </div>
      <div class="form-controle">
        <input type="password" name="senha" id="n_senha" oninput="validarAcessoSenha()" required minlength="8" maxlength="8">
        <label>Digite sua senha</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Acessar</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="limparTudo()">Limpar Tudo</button>
      <div class="form-help">
      </div>
    </form>

    <p class="margin-top">Novo em Modavo? <a href="../Site-Modavo-main/page_submit.php"><b>Cadastre-se agora</b></a></p>
    <div id="resultado"></div>
  </div>
  <div style="display:none;"></div>
  <script src="../Site-Modavo-main/assets/js/page_login.js"></script>
  <script src="../Site-Modavo-main/assets/js/page_submit.js"></script>
  <script>
    function limparTudo() {
      document.getElementById('c_login').value = '';
      document.getElementById('n_senha').value = '';
      document.getElementById('remember-me').checked = false;
    }
  </script>
</body>

</html>

