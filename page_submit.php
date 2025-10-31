<?php
if (isset($_POST['submit'])) {
    // Incluir o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // Capturar os dados do formulário e escapar caracteres especiais
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
    $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
    $nome_materno = mysqli_real_escape_string($conexao, $_POST['nome_materno']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $celular = mysqli_real_escape_string($conexao, $_POST['celular']);
    $fixo = mysqli_real_escape_string($conexao, $_POST['fixo']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $rua = mysqli_real_escape_string($conexao, $_POST['rua']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $login = mysqli_real_escape_string($conexao, $_POST['login']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $conf_senha = mysqli_real_escape_string($conexao, $_POST['conf_senha']);
    $permissoes = mysqli_real_escape_string($conexao, $_POST['permissoes']);

    // Verificar se a confirmação da senha é igual à senha
    if ($senha !== $conf_senha) {
        echo "As senhas não coincidem.";
        exit();
    }

    // Inserindo dados no banco de dados usando prepared statement
    $stmt = $conexao->prepare("INSERT INTO usuarios(nome, data_nascimento, nome_materno, cpf, email, cep, rua, numero, bairro, cidade, estado, celular, fixo, login, senha, conf_senha, genero, permissoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssi", $nome, $data_nascimento, $nome_materno, $cpf, $email, $cep, $rua, $numero, $bairro, $cidade, $estado, $celular, $fixo, $login, $senha, $conf_senha, $genero, $permissoes);

    // Executar o statement
    if ($stmt->execute()) {
        // Redirecionar após o cadastro bem-sucedido
        header('Location: page_login.php');
        exit();
    } else {
        // Exibir mensagem de erro se a inserção falhar
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    // Fechar o statement e a conexão
    $stmt->close();
    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Modavo</title>
    <link rel="stylesheet" href="../Site-Modavo-main/assets/css/main.css">
    <!-- Favicon -->
    <link href="../Site-Modavo-main/assets/img/icons/favicontelecall.png" rel="icon">
    <!-- Bootstrap Components-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Site-Modavo-main/assets/css/style.css">
</head>
<body class="body-submit">
    <div class="stars"></div>
    <div class="stars2"></div>
    <div class="box">
        <div class="form-box">
            <div id="resultado" style="color: red;width: 100%;"></div>  
            <h2>Cadastre-se</h2>
            <p>Já é um membro? <a href="page_login.php">Login</a></p>
            <form action="page_submit.php" id="form" method="POST">
                <div class="input-group">
                    <label for="name">Digite seu nome</label>
                    <input type="text" id="nome" name="nome" class="input required" minlength="15" maxlength="80" required>
                </div>
                <div class="input-group">
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="campo" required>
                </div>
                <div class="input-group">
                    <label for="name_m">Nome materno</label>
                    <input type="text" name="nome_materno" id="nome_materno" required minlength="10" maxlength="60">
                </div>
                <div class="input-group">
                    <label for="genero">Gênero</label>
                    <select name="genero" id="genero" required>
                        <option value="s">Selecionar</option>
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                        <option value="o">Prefiro não informar</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="Insira seu CPF (somente números)" required minlength="11" maxlength="11">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email" required maxlength="60">
                </div>
                <div class="input-group">
                    <label for="celular">Telefone Celular</label>
                    <input type="tel" class="input required" name="celular" id="celular" placeholder="(+55)xx-xxxxxxxxx" required>
                </div>
                <div class="input-group">
                    <label for="fixo">Telefone Fixo</label>
                    <input type="tel" name="fixo" id="tel_fixo" placeholder="(+55)xx-xxxxxxxx" minlength="13" maxlength="18" class="input required" required>
                </div>
                <div class="input-group">
                    <label for="cep">Código postal</label>
                    <input name="cep" id="cep" class="input required" oninput="buscaCep()" placeholder="Apenas números" required minlength="8" maxlength="9">
                </div>
                <div class="input-group">
                    <label for="rua">Rua</label>
                    <input name="rua" id="rua" required>
                </div>
                <div class="input-group">
                    <label for="numero">Número</label>
                    <input name="numero" id="numero" required>
                </div>
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input name="bairro" id="bairro" required>
                </div>
                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input name="cidade" id="cidade" required>
                </div>
                <div class="input-group">
                    <label for="estado">Estado</label>
                    <input name="estado" id="estado" required>
                </div>
                <div class="input-group">
                    <label for="login">Digite seu login</label>
                    <input type="text" name="login" id="login" class="input required" required minlength="6" maxlength="6">
                </div>
                <div class="input-group">
                    <label for="senha">Digite sua senha</label>
                    <input type="password" name="senha" id="senha" required minlength="8" maxlength="8">
                </div>
                <div class="input-group">
                    <label for="conf_senha">Repita sua senha</label>
                    <input type="password" name="conf_senha" id="conf_senha" required minlength="8" maxlength="8">
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" id="submit">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="limparTudo()">Limpar Tudo</button>
                    <div class="form-help">
                        <a href="#">Precisa de ajuda?</a>
                        <input type="hidden" id="permissoes" name="permissoes" value="1">
                    </div>
                </div>
            </form>
            <script src="assets/js/page_submit.js"></script>
            <script src="assets/js/page_login.js"></script>
            <script>
                document.querySelector('form').addEventListener('submit', function() {
                    document.querySelector('#bairro').disabled = false;
                    document.querySelector('#cidade').disabled = false;
                    document.querySelector('#estado').disabled = false;
                    document.querySelector('#rua').disabled = false;
                });
            </script>
        </div>
    </div>
</body>
</html>
