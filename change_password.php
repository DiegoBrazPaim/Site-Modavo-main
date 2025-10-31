<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['id']) && !isset($_SESSION['login'])) { 
    header("Location: index.php");
}
else{
$id = $_SESSION['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .body-login {
            background: linear-gradient(0, #2AADE5, #000000);
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .form-wrapper {
            border-radius: 4px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            background: #2AADE5;
            box-shadow: 0px 0px 7px -1px;
            box-sizing: border-box;
        }
        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .form-wrapper form {
            margin: 0;
        }
        .form-controle {
            height: 50px;
            position: relative;
            margin-bottom: 16px;
        }
        .form-controle input {
            height: 100%;
            width: 100%;
            background: #ffffff;
            box-shadow: 1px 1px 10px 0px;
            border: none;
            outline: none;
            border-radius: 4px;
            color: #383737;
            font-size: 1rem;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .form-controle input:is(:focus, :valid) {
            background: #ffffff;
            padding: 16px 20px 0;
        }
        .form-controle label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            pointer-events: none;
            color: #4e4d4d;
            transition: all 0.1s ease;
        }
        .form-controle input:is(:focus, :valid)~label {
            font-size: 0.75rem;
            transform: translateY(-130%);
        }
        form button {
            width: 100%;
            padding: 16px 0;
            font-size: 1rem;
            background: #09222c;
            color: #fff;
            font-weight: 500;
            border-radius: 4px;
            border: none;
            outline: none;
            margin: 25px 0 10px;
            cursor: pointer;
            transition: 0.1s ease;
        }
        form button:hover {
            background: #ffffff;
            color: black;
            transform: scale(1.02);
        }
        .form-wrapper a {
            text-decoration: none;
            color: #ffffff;
        }
        .form-wrapper a:hover {
            text-decoration: underline;
        }
        .form-wrapper small {
            display: block;
            margin-top: 15px;
            color: #b3b3b3;
        }
        .form-wrapper small a {
            color: #ffffff;
        }
        @media (max-width: 740px) {
            .form-wrapper {
                padding: 20px;
            }
            .form-wrapper h2 {
                font-size: 1.5rem;
            }
            .form-wrapper form {
                margin-bottom: 40px;
            }
        }
    </style>
    <script>
        function validateForm() {
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (newPassword !== confirmPassword) {
                alert("As senhas não coincidem!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="body-login">
    <div class="form-wrapper">
        <h2>Alterar Senha</h2>
        <form action="altsenha.php" method="post">
            <div class="form-controle">
                <input type="password" id="n_senha" name="senha"  required minlength="8" maxlength="8">
                <label for="new_password">Nova Senha:</label>
            </div>
            <div class="form-controle">
                <input type="password" id="n_senha" name="conf_senha"  required minlength="8" maxlength="8">
                <label for="confirm_password">Confirmar Nova Senha:</label>
                <input type="hidden" name="id" value="<?php echo $id?>">
            </div>
            <button type="submit" name="update">Alterar Senha</button>
        </form>
    </div>
</body>
</html>
