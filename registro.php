<?php

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Senha: ' . $_POST['senha']);

        include_once('conexao.php');

        $nome_user = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
      
        //Corrigindo os parâmetros no mysqli_query
        $result = mysqli_query($mysqli, "INSERT INTO registrar(Nome, email, senha) 
        VALUES ('$nome_user', '$email', '$senha')");

        if($result) {
            header('Location: login.php');
        } else {
            echo "Erro ao registrar o usuário.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>

</head>
<body>
    <div class="box">
        <form action="registro.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                
                
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
