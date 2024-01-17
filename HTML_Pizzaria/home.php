<?php

include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();
session_start();

if (isset($_POST['mensagem'])) {
  $comentario = $_POST['mensagem'];
  $id = $_SESSION['id'];
  if (!isset($_SESSION['id'])) {
    header('location:login.php');
    exit();
  } else {
    $sql = $pdo->prepare("INSERT INTO `comentarios`(`comentario`, `id_cliente`) VALUES ('$comentario',$id)");
    $sql ->execute();
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

  <link rel="stylesheet" href="../CSS_Pizzaria/home.css">
</head>

<body>

  <?php
  include('include_header.php');

  ?>

  <section class="banner-main">
    <h1>Pizzaria <span>Michelangelo</span></h1><br>
    <a href="contato.php">Contato</a>
  </section>

  <main><!--Conteudo Principal do site-->

    <section class="monte-pizza"><!--Sessão do cárdapio-->
      <div class="separador">
        <h2>Nossa pizzaria</h2>
      </div>

      <h2>Um pouco do nosso <span>Cardápio</span>.</h2>
      <div class="container-card container">
        <div class="card" style="width: 20rem;">
          <img src="../IMG/pizzas.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pizzas</h5>
            <p class="card-text">Uma combinação magistral de ingredientes e uma base crocante que vai te levar a uma jornada de sabores inigualáveis.</p>

          </div>
        </div>
        <div class="card" style="width: 20rem;">
          <img src="../IMG/esfiha.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Esfihas</h5>
            <p class="card-text">Uma pequena maravilha da culinária árabe. Sua massa macia e levemente aerada abraça um recheio repleto de sabores intensos e aromáticos.</p>

          </div>
        </div>
        <div class="card" style="width: 20rem;">
          <img src="../IMG/bebidas.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Bebidas</h5>
            <p class="card-text">Em nosso cardápio, as bebidas são mais do que simplesmente uma maneira de saciar a sede. São uma celebração do prazer líquido.</p>
          </div>
        </div>
      </div>
      <div class="botao-monte-sua-pizza">
        <button><a href="cardapio.php">Veja nossos cardápios ! </a></button>
      </div>
    </section>


    <section class="banner-secundario"><!--Banner da pizzaria--></section>
    <div class="separador">
      <h3>Avaliações</h3>
    </div>
    <section class="avaliacoes-container">
      <h2>Avaliações dos <span>Clientes</span>.</h2>
      <section class="avalie container">
        <form class="container-input-avaliacao" action="#" method="post">
          <textarea name="mensagem" placeholder="Compartilhe com nós a sua experiência com a Pizzaria Michelangelo"></textarea>
          <a href="contato.php" id="ver_comentarios">Veja mais comentários</a>

          <input type="submit" value="Enviar">

        </form>
        </div>
      </section>
    </section>
  </main>

  <?php
  include('include_footer.php');
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


  </script>
</body>

</html>