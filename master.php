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

$logado = $_SESSION['login'];
$perm = $_SESSION['permissoes'];

$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conexao->query($sql);

/* Fará com que somente o usuario com a permissão 2(ADM) consiga entrar no site */
if ($perm == 1) {
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário Master</title>
    <style>
        :root {
            --color-default: #333;
            --color-primary: #007bff;
            --color-secondary: #0056b3;
            --bgcolor-default: #f4f4f4;
            --font-primary: Arial, sans-serif;
        }
        body {
            font-family: var(--font-primary);
            margin: 0;
            padding: 0;
            background-color: var(--bgcolor-default);
        }
        .header {
            background-color: var(--color-default);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            padding: 20px;
            max-width: 100%;
            overflow-x: auto;
        }
        .navbar {
            background-color: var(--color-default);
            padding: 0;
        }
        .navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }
        .navbar li {
            position: relative;
        }
        .navbar a,
        .navbar a:focus {
            display: flex;
            text-decoration: none;
            align-items: center;
            justify-content: space-between;
            padding: 10px 30px;
            font-family: var(--font-primary);
            font-size: 1.2rem;
            font-weight: 400;
            color: white;
            white-space: nowrap;
            transition: 0.3s;
        }
        .navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: var(--color-primary);
            text-decoration: underline;
        }
        .navbar .get-a-quote,
        .navbar .get-a-quote:focus {
            background: var(--color-primary);
            padding: 8px 20px;
            margin-left: 30px;
            border-radius: 4px;
            color: white;
        }
        .navbar .get-a-quote:hover,
        .navbar .get-a-quote:focus:hover {
            color: var(--color-secondary);
            background: var(--color-primary);
        }
        .card {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: var(--color-default);
            color: white;
            border: none;
            cursor: pointer;
        }
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            white-space: nowrap;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .delete-button {
            color: red;
            cursor: pointer;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <div class="header">
        <h1>Painel do Usuário Master</h1>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="../Site-Modavo-main/index.php">Principal</a></li>
        </ul>
    </div>

    <div class="container">
        <div id="consulta-usuario" class="card">
            <h2>Consulta de Usuário</h2>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Nome Materno</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>CEP</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Celular</th>
                            <th>Fixo</th>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Confirmação de Senha</th>
                            <th>Gênero</th>
                            <th>Permissões</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>". $user_data['id']. "</td>";
                            echo "<td>". $user_data['nome']. "</td>";
                            echo "<td>". $user_data['data_nascimento']. "</td>";
                            echo "<td>". $user_data['nome_materno']. "</td>";
                            echo "<td>". $user_data['cpf']. "</td>";
                            echo "<td>". $user_data['email']. "</td>";
                            echo "<td>". $user_data['cep']. "</td>";
                            echo "<td>". $user_data['rua']. "</td>";
                            echo "<td>". $user_data['numero']. "</td>";
                            echo "<td>". $user_data['bairro']. "</td>";
                            echo "<td>". $user_data['cidade']. "</td>";
                            echo "<td>". $user_data['estado']. "</td>";
                            echo "<td>". $user_data['celular']. "</td>";
                            echo "<td>". $user_data['fixo']. "</td>";
                            echo "<td>". $user_data['login']. "</td>";
                            echo "<td>". $user_data['senha']. "</td>";
                            echo "<td>". $user_data['conf_senha']. "</td>";
                            echo "<td>". $user_data['genero']. "</td>";
                            echo "<td>". $user_data['permissoes']. "</td>";
                            echo "<td><a class='delete-button' href='delete.php?id=$user_data[id]' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'><i class='bi bi-trash'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+cMHmg1cJ3GxY8E8aRQEovB60DC4DPC7dNqEMZqumBBKMO4n6RA9eBQFjFMK6B" crossorigin="anonymous"></script>
</body>
</html>
