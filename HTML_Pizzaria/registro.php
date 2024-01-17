<?php

include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $tel = $_POST['tel'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confsenha = $_POST['confsenha'];

  if (!empty($nome) && !empty($endereco) && !empty($tel) && !empty($cpf) && !empty($email) && !empty($senha)) {
    $u->conectar();
    if ($senha == $confsenha) {
      if ($u->cadastrar($nome, $endereco, $tel, $cpf, $email, $senha)) {
        header("location: login.php");
      } else {
        $msgerror =  "Usuario já cadastrado";
      }
    } else {
      $msgerror =  "As senhas não coincidem";
    }
  } else {
    $msgerror =  "Preencha todos os campos";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Michelangelo Pizzaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS_Pizzaria/login.css">
</head>

<body>

  <div class="container">
    <div class="row" id="cad">
      <div class="col-lg-8 offset-lg-2 register-section">

        <div class="icon-container">
          <i class="fas fa-user-plus"></i>
        </div>

        <div class="icon-container">
          <img src="../IMG/logopizza.png" alt="">
        </div>
        <h2 class="text-center mb-4" id="h2_cad">Cadastro</h2>

        <form method="post" action="#">
          <div class="form-group">
            <label for="fullname">Nome Completo:</label>
            <input type="text" id="fullname" name="nome" placeholder="Digite seu nome completo">

            <label for="fullname">Cpf:</label>
            <input type="text" id="fullname" name="cpf" placeholder="Digite o seu CPF">

            <label for="fullname">Endereço:</label>
            <input type="text" id="fullname" name="endereco" placeholder="Digite o seu Endereço">

            <label for="email">Telefone:</label>
            <input type="text" id="email" name="tel" placeholder="Digite o seu Telefone">

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail">

            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" placeholder="Digite sua senha">

            <label for="password">Confirme a senha:</label>
            <input type="password" id="password" name="confsenha" placeholder="Confirme a sua senha">
            <div class="mensagem-erro">
              <label><?php
                      if (isset($_POST['nome'])) {
                        echo $msgerror;
                      };
                      ?> </label>
            </div>
            <button type="submit" class="login-btn" name="botao">Registrar</button>
        </form>

        <div class="login-link">
          <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
        </div>

      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>