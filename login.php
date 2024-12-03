<?php
session_start(); // Inicialização da sessão

include('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) {

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    if(strlen($email) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($senha) == 0) {
        echo "Preencha sua senha";
    } else {

        $sql_code = "SELECT * FROM registrar WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: pages\home\index.html");
            exit(); // Encerre o script após o redirecionamento
        } else {
            echo "E-mail ou senha incorretos";
        }
    }
} /* else {
    echo "Campos de e-mail e senha são obrigatórios";
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="home\index.html" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <input class="inputSubmit" type="submit" name="submit" value="enviar">
        <button type="submit">Entrar</button>
    </form>

    <script>
        document.getElementById('todas-home').addEventListener('click', function() {
            window.location.href = '../home/index.html';});
    </script>

</body>
</html>