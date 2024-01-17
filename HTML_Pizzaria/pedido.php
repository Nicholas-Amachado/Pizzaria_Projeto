<?php
include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Michelangelo Pizzaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../CSS_Pizzaria/pedido.css">
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 contact-section">
      

      
            <div class="contact-info">
       <div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 info-section">
    <?php
      $id_user = $_SESSION['id'];
      
      $query = $pdo->query("SELECT * FROM clientes INNER JOIN pedido ON clientes.id = pedido.id_cliente WHERE clientes.id = $id_user ORDER BY pedido.id DESC LIMIT 1;");
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach($res as $row) {
        
        $id = $row["id"];
        $nome = $row["nome"];
        $endereco = $row["endereco"];
        $cpf = $row["cpf"];
        $cupom = $row["nome_cupom"];
        $valor_total = $row["valor_total"];
        $itens = $row['itens_pedidos'];
        
        //$cupom = $row["cupom"];
        ?>
              <h2 class="text-center mb-4">Informações do Pedido</h2>

<div class="info-item">
  <label>Nome:</label>
  <span><?php echo $nome ?></span>
</div>

<div class="info-item">
  <label>CPF:</label>
  <span><?php echo $cpf ?></span>
</div>

<div class="info-item">
  <label>Endereço:</label>
  <span><?php echo $endereco ?></span>
</div>

<div class="info-item">
  <label>Número do Pedido:</label>
  <span><?php  echo $id ?></span>
</div>

<div class="info-item" id="itens">
  <label>Itens :</label>
  <div class="container_itens">
  <span id="itens_container"><?php echo $itens?></span>
  </div>

</div>

<div class="info-item">
  <label>Valor:</label>
  <span><?php echo $valor_total ?></span>
</div>

<div class="info-item">
  <label>Cupom:</label>
  <span><?php if (isset($cupom)){
    echo $cupom;
  }
  else{
    echo"Nenhum cupom usado";
  } ?></span>
</div>
<a href="home.php" id="concluido">Concluido</a>
</div>
</div>
</div>
      <?php }
      ?>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>