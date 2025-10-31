<?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $nome_materno = $_POST['nome_materno'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $fixo = $_POST['fixo'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $conf_senha = $_POST['conf_senha'];
    $genero = $_POST['genero'];
    $permissoes = $_POST['permissoes'];

    // Inserindo dados no banco de dados
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, data_nascimento, nome_materno, cpf, email, cep, rua, numero, bairro, cidade, estado, celular, fixo, login, senha, conf_senha, genero, permissoes) VALUES ('$nome','$data_nascimento','$nome_materno','$cpf','$email','$cep','$rua','$numero','$bairro','$cidade','$estado','$celular','$fixo','$login','$senha','$conf_senha','$genero','$permissoes')");

    // Redirecionar após o cadastro
    header('Location: page_login.html');
    exit(); // Certifique-se de usar exit após header
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Modavo</title>
    <link rel="stylesheet" href="../Site-Modavo-main/assets/css/main.css">
    <link href="../Site-Modavo-main/assets/img/icons/favicontelecall.png" rel="icon">
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
            <p>Já é um membro? <a href="page_login.html">Login</a></p>
            <form action="formulario.php" method="POST">
                <div class="input-group">
                    <label for="nome">Digite seu nome</label>
                    <input type="text" name="nome" id="nome" class="input required" minlength="15" maxlength="60" pattern="^[a-zA-Z\s]{15,60}$" required>
                </div>
                <div class="input-group">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="campo" required>
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
                    <label for="nome_materno">Nome materno</label>
                    <input type="text" name="nome_materno" id="nome_materno" pattern="^[a-zA-Z\s]{10,60}$" required minlength="10" maxlength="60">
                </div>
                <div class="input-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="insira seu CPF (somente números)" pattern="^\d{11}$" required>
                </div>
                <div class="input-group">
                    <label for="celular">Telefone Celular</label>
                    <input type="tel" name="celular" id="celular" pattern="\(\+55\)[0-9]{2}-[0-9]{9}" title="O formato deve ser (+55)XX-XXXXXXXXX" required>
                </div>
                <div class="input-group">
                    <label for="fixo">Telefone Fixo</label>
                    <input type="tel" name="fixo" id="fixo" pattern="\(\+55\)[0-9]{2}-[0-9]{8}" title="O formato deve ser (+55)XX-XXXXXXXX" required>
                </div>
                <div class="input-group">
                    <label for="cep">Código postal</label>
                    <input type="text" name="cep" id="cep" pattern="\d{8}" placeholder="apenas números" required>
                </div>
                <div class="input-group">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" id="rua" required>
                </div>
                <div class="input-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" required>
                </div>
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" required>
                </div>
                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" required>
                </div>
                <div class="input-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" required>
                </div>
                <div class="input-group">
                    <label for="login">Digite seu login</label>
                    <input type="text" name="login" id="login" pattern="^[a-zA-Z]{6}$" required minlength="6" maxlength="6">
                </div>
                <div class="input-group">
                    <label for="senha">Digite sua senha</label>
                    <input type="password" name="senha" id="senha" pattern="^[a-zA-Z0-9]{8}$" required minlength="8" maxlength="8">
                </div>
                <div class="input-group">
                    <label for="conf_senha">Repita sua senha</label>
                    <input type="password" name="conf_senha" id="conf_senha" pattern="^[a-zA-Z0-9]{8}$" required minlength="8" maxlength="8">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <!--div class="input-group">
                    <label for="permissoes">Permissões</label>
                    <input type="text" name="permissoes" id="permissoes" required>
                </div-->
                <div class="input-group">
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="limparTudo()">Limpar Tudo</button>
                    <div class="form-help">
                        <a href="#">Precisa de ajuda?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../Site-Modavo-main/assets/js/page_submit.js"></script>
    <script src="../Site-Modavo-main/assets/js/page_login.js"></script>
</body>
</html>
