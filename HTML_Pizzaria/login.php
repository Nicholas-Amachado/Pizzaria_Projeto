<?php
include_once("../PHP_Functions/Functions.php");
?>
<!DOCTYPE html>
<html lang="en" id="html_login">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Michelangelo Pizzaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <link rel="stylesheet" href="../CSS_Pizzaria/login.css" />
</head>

<body>
  
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 login-section">
        <div class="icon-container">
          <img src="../IMG/logopizza.png" alt="" />
        </div>

        <h2 class="text-center mb-4">Login</h2>

        <form method="post" action="#">
          <div class="form-group">
            <label for="username">E-mail:</label>
            <input type="text" id="username" class="form-control" name="email"  placeholder="Digite seu E-mail" required />
          </div>

          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" class="form-control" name="senha" placeholder="Digite sua senha" required />
          </div>

          <button type="submit" class="btn btn-primary login-btn">
            Entrar
          </button>
        </form>

        <div class="register-link">
          <p>
            Não tem uma conta? <a href="registro.php">Cadastre-se aqui</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <?php


  $u = new usuario;
  if (isset($_POST['email'])) {
    $email = ($_POST['email']);
    $senha = ($_POST['senha']);
    if (!empty($email) && ($senha)) {
      $u->conectar();
      if ($u->logar($email, $senha)) {
        header('location:home.php');
      } else {
        echo 'erro de email ou senha';
      }
    } else {
      echo ' Preencher todos os
    campos';
    }
  } ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>