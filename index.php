<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        
        }

    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Irish Grover:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" />
</head>
<body>
    <a class="rectangle-parent">
      <div class="group-child"></div>
      <div class="rectangle-group">
        <img class="frame-child" alt="" src="./public/rectangle-2@2x.png" />

        <div class="terms-privacy">
          <div class="privacy-policy">PRIVACY POLICY</div>
          <div class="terms-privacy-child"></div>
          <div class="terms-of-service">TERMS OF SERVICE</div>
        </div>
        <div class="text-content-wrapper">
          <div class="text-content">
            <div class="brands">
              <div class="logo-brand">
                <div class="logo-brand-child"></div>
                <div class="logo-brand-item"></div>
                <div class="logo-brand-inner"></div>
                <div class="ellipse-div"></div>
                <div class="logo-brand-child1"></div>
                <div class="d-parent">
                  <div class="d">d</div>
                  <div class="g">G</div>
                </div>
              </div>
              <div class="plantwise-parent">
                <div class="plantwise">Plantwise</div>
                <div class="platform-discussion">Platforma de Discussão</div>
              </div>
            </div>
            <div class="qualquer-dvida-sobre">
              Qualquer dúvida, sobre oque você precisar e com criptografia de
              ponta a ponta!
            </div>
          </div>
        </div>
        <div class="thread-group">
          <div class="thread-1">
            <div class="aqui-ns-buscamos">
              Aqui nós buscamos difundir o conhecimento e ajudar a todos em
              primeiro lugar! Fazendo isso com segurança.
            </div>
            <div class="frame-parent">
              <div class="frame-group">
                <div class="avatar-1-wrapper">
                  <img
                    class="avatar-1-icon"
                    alt=""
                    src="./public/avatar-1@2x.png"
                  />
                </div>
                <div class="ebayyou-anggoro-parent">
                  <div class="ebayyou-anggoro">Ebayyou Anggoro</div>
                  <div class="h-ago">6h ago</div>
                </div>
              </div>
              <div class="rectangle-container">
                <div class="group-item"></div>
                <div class="consultor">Consultor</div>
              </div>
            </div>
            <div class="fale-sobre-o">Fale sobre o cultivo sem medo!</div>
            <div class="frame-container">
              <div class="frame-div">
                <img class="frame-item" alt="" src="./public/frame-19.svg" />

                <div class="frame-wrapper">
                  <div class="frame-parent1">
                    <div class="vector-parent">
                      <img
                        class="vector-icon"
                        alt=""
                        src="./public/vector.svg"
                      />

                      <div class="ebayyou-anggoro">Responda</div>
                    </div>
                    <div class="wrapper">
                      <div class="div">10</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-div">
                <div class="thumbs-up-parent">
                  <img
                    class="thumbs-up-icon"
                    alt=""
                    src="./public/thumbsup.svg"
                  />

                  <div class="plantwise">10</div>
                </div>
                <div class="thumbs-down-parent">
                  <img
                    class="thumbs-up-icon"
                    alt=""
                    src="./public/thumbsdown.svg"
                  />

                  <div class="plantwise">10</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="left-side">
        <div class="login">Login</div>
        <div class="voc-pode-logar">
          Você pode logar com sua previamente conta registrada, ou fazer login
          rápido usando sua conta Google.
        </div>
        <div class="spacing"></div>
        <div class="button" id="google-login">
          <img class="google-icon-1" alt="" src="./public/googleicon-1.svg" />

          <div class="login-with-google">Login with Google</div>
        </div>
        <div class="spacing-parent">
          <div class="spacing1"></div>
          <div class="rectangle-parent1">
            <div class="frame-inner"></div>
            <div class="frame-inner"></div>
          </div>
          <div class="or">or</div>
        </div>
        <div class="spacing2"></div>
        <div class="form">
          <div class="form-group">
          <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
        </div>
        <div class="spacing3"></div>
        <div class="no-tem-uma-container">
          <span>Não tem uma conta?</span>
          <span class="span"> </span>
          <span class="crie-uma" id="create-account">Crie uma!</span>
        </div>
      </div>
    </a>
    
</body>
</html>