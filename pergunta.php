<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: page_login.php');
    exit;
}

// Inicialize as variáveis de erro se não estiverem definidas
if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}
if (!isset($_SESSION['cepErrado'])) {
    $_SESSION['cepErrado'] = false;
}
if (!isset($_SESSION['maeErrada'])) {
    $_SESSION['maeErrada'] = false;
}
if (!isset($_SESSION['datanascErrada'])) {
    $_SESSION['datanascErrada'] = false;
}

$rand = rand(1, 3);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA-Modavo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../Site-Modavo-Main/assets/img/modavo.png">
    <style>
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
            position: absolute;
            left: 50%;
            top: 55%;
            border-radius: 4px;
            padding: 20px;
            width: 100%;
            max-width: 500px;
            transform: translate(-50%, -50%);
            background: #2AADE5;
            box-shadow: 0px 0px 7px -1px;
            box-sizing: border-box;
        }

        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
        }

        .form-wrapper form {
            margin: 25px 0;
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

        .form-controle input:focus, .form-controle input:valid {
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

        .form-controle input:focus ~ label, .form-controle input:valid ~ label {
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
        }

        .form-wrapper a:hover {
            text-decoration: underline;
        }

        .form-wrapper label.label-erro {
            color: red;
        }

        .form-wrapper .input-erro {
            border: 2px solid red;
        }

        .form-wrapper :where(label, p, small, a) {
            color: #ffffff;
        }

        .form-wrapper p {
            color: red;
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
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .form-wrapper form {
                margin: 25px 0 40px;
            }
        }
    </style>
</head>
<body class="body-login">

<?php if ($rand == 1): ?>
    <div class="form-wrapper">
        <div><a href="../Site-Modavo-main/index.php"><img src="../Site-Modavo-Main/assets/img/modavo.png" alt="Modavo Logo"></a></div>
        <form action="teste2fa.php" method="POST">
            <div class="form-controle">
                <input type="text" name="nome_materno" id="mae" required>
                <label for="mae" class="<?= $_SESSION['maeErrada'] ? 'label-erro' : '' ?>">Qual é o nome da sua mãe?</label>
            </div>
            <?php if ($_SESSION['tentativas'] > 0 && $_SESSION['maeErrada']): ?>
                <p>Tentativa incorreta. Tentativas restantes: <?= 3 - $_SESSION['tentativas'] ?></p>
            <?php endif; ?>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>

<?php elseif ($rand == 2): ?>
    <div class="form-wrapper">
        <div><a href="../Site-Modavo-main/index.php"><img src="../Site-Modavo-Main/assets/img/modavo.png" alt="Modavo Logo"></a></div>
        <form action="teste2fa.php" method="POST">
            <div class="form-controle">
                <input type="date" name="data_nascimento" id="datanasc" required>
                <label for="datanasc" class="<?= $_SESSION['datanascErrada'] ? 'label-erro' : '' ?>">Qual é a sua data de nascimento?</label>
            </div>
            <?php if ($_SESSION['tentativas'] > 0 && $_SESSION['datanascErrada']): ?>
                <p>Tentativa incorreta. Tentativas restantes: <?= 3 - $_SESSION['tentativas'] ?></p>
            <?php endif; ?>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
    
<?php else: ?>
    <div class="form-wrapper">
        <div><a href="../Site-Modavo-main/index.php"><img src="../Site-Modavo-Main/assets/img/modavo.png" alt="Modavo Logo"></a></div>
        <form action="teste2fa.php" method="POST">
            <div class="form-controle">
                <input type="text" name="cep" id="cep" required>
                <label for="cep" class="<?= $_SESSION['cepErrado'] ? 'label-erro' : '' ?>">Qual é o seu CEP?</label>
            </div>
            <?php if ($_SESSION['tentativas'] > 0 && $_SESSION['cepErrado']): ?>
                <p>Tentativa incorreta. Tentativas restantes: <?= 3 - $_SESSION['tentativas'] ?></p>
            <?php endif; ?>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
<?php endif; ?>

<script>
    // Script para remover o placeholder quando o usuário digitar no campo de texto
    const inputs = document.querySelectorAll('.form-controle input');

    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.nextElementSibling.classList.add('shrink');
            } else {
                this.nextElementSibling.classList.remove('shrink');
            }
        });
    });
</script>

</body>
</html>
