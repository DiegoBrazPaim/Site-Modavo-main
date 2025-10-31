<?php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    // Função para validar o nome
    function validarNome($nome) {
        return strlen($nome) >= 3 && strlen($nome) <= 60;
    }

    // Função para validar o login
    function validarLogin($login) {
        return strlen($login) == 6;
    }

    // Função para validar a senha
    function validarSenha($senha) {
        return strlen($senha) == 8 && !preg_match('/\d/', $senha);
    }

    // Função para validar a confirmação de senha
    function validarConfirmarSenha($senha, $confirmar_senha) {
        return $senha == $confirmar_senha;
    }

    // Verifica se todos os campos foram preenchidos corretamente
    if (validarNome($nome) && validarLogin($login) && validarSenha($senha) && validarConfirmarSenha($senha, $confirmar_senha)) {
        // Redireciona para a página de login após 5 segundos
        header("Refresh: 5; URL=../Site-Modavo-main/page_login.html");
        // Mensagem de sucesso
        $mensagem = "Cadastro realizado! Direcionando para a página de login...";
    } else {
        // Mensagem de erro
        $mensagem = "[ERROR404] - Avalie as informações cadastradas";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <style>
        /* Estilos CSS */
    </style>
</head>
<body>
    <!-- Formulário de cadastro -->
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="nome" class="required" placeholder="Nome" required>
        <input type="text" name="login" class="required" placeholder="Login" required>
        <input type="password" name="senha" class="required" placeholder="Senha" required>
        <input type="password" name="confirmar_senha" class="required" placeholder="Confirmar Senha" required>
        <button type="submit" id="submit_cadastro">Cadastrar</button>
    </form>

    <!-- Resultado da validação -->
    <div id="resultado" style="color: <?php echo isset($mensagem) && strpos($mensagem, "ERRO") !== false ? "red" : "white"; ?>">
        <?php echo isset($mensagem) ? $mensagem : ""; ?>
    </div>

    <!-- Scripts JavaScript -->
    <script src="page_submit.js"></script>
</body>
</html>
