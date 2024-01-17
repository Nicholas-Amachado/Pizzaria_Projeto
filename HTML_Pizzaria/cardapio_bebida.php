<?php
include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cárdapio Bebida</title>
  <title>Michelangelo Pizzaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS_Pizzaria/cardapio.css" />
</head>

<body>
<?php

include_once("include_header.php");

?>
  <main>
    <div class="title">
      <div>
        <h1>Cárdapio</h1>
        <h2>Bebidas</h2>
      </div>
    </div>

    <div class="container">

      <div class="container-pizzas">

        <section class="monte-pizza">
          <div class="separador">

            <div class="line-monte"></div>
            <h4>Promoções</h4>

          </div>

          <div class="container-pizzas-monte">
            <?php



            $query = $pdo->query("SELECT * FROM promocao_bebida INNER JOIN bebida ON bebida.id = promocao_bebida.id_bebida ");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);


            $query = $pdo->query("SELECT valor_promo FROM promocao_bebida INNER JOIN bebida ON bebida.id = promocao_bebida.id_bebida");
            $res_valor = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($res as $pizza) {
              $id = $pizza['id'];
              $sabor = $pizza['nome'];
              $valor = $pizza['preco'];
              $descricao = $pizza['tipo'];
              $img = $pizza['img'];

              foreach ($res_valor as $valor_antigo)

                $valor_passado = $valor_antigo['valor_promo']




                  ?>
                <div class="card">
                  <img src="<?php echo $img ?>" alt="Pizzas" class="foto_pizza"></img>
                <div class="itens-pizza">
                  <p id="sabor_pizza">
                    <?php echo $sabor ?>
                  </p>

                  <div class="preco_promo">
                    <p class="preco_pizza" id="antigo_valor">
                      <?php echo "R$ " . $valor ?>
                    </p>
                    <p class="preco_pizza">
                      <?php
                      $novo_valor = $valor - $valor_passado;
                      echo "R$ " . $novo_valor;
                      ?>
                    </p>
                  </div>

                  <form action="carrinho.php" method="post">
                    <input type="number" value="1" name="quantidade" class="quantidade">

                    <input type="hidden" name="id_oculto" value="<?php echo $id ?>">

                    <input type="hidden" name="novo_valor" value="<?php echo $novo_valor ?>">

                    <input type="hidden" name="tipo" value="<?php echo 3 ?>">

                    <input type="submit" name="btt" value="Adicionar ao carrinho">
                  </form>
                </div>
              </div>
              <?php
            }
            ?>








          </div>


        </section>



      </div>
      <div class="container-pizzas">

        <section class="monte-pizza">
          <div class="separador">

            <div class="line-monte"></div>
            <h4>Bebidas não alcoolicas</h4>

          </div>

          <div class="container-pizzas-monte">
            <?php

            $query = $pdo->query("SELECT * FROM bebida WHERE tipo = '2' AND NOT EXISTS ( SELECT * FROM promocao_bebida WHERE bebida.id = promocao_bebida.id_bebida)");
            $res11 = $query->fetchAll(PDO::FETCH_ASSOC); foreach ($res11 as $pizza) {
              $id = $pizza['id'];
              $sabor = $pizza['nome'];
              $valor = $pizza['preco'];
              $descricao = $pizza['tipo'];
              $img = $pizza['img'];
              ?>

              <div class="card">

                <img src="<?php echo $img ?>" alt="Pizzas" class="foto_pizza"></img><!--Sabor do item-->


                <div class="itens-pizza">

                  <p id="sabor_pizza">
                    <?php echo $sabor ?>
                  </p><!--Sabor do item-->

                  <p class="preco_pizza">
                    <?php echo "R$ " . $valor ?>
                  </p> <!--Valor do item-->

                  <form action="carrinho.php" method="post">
                    <input type="number" value="1" name="quantidade" class="quantidade">

                    <input type="hidden" name="id_oculto" value="<?php echo $id ?>">

                    <input type="hidden" name="tipo" value="<?php echo 3 ?>">

                    <input type="submit" name="btt" value="Adicionar ao carrinho">
                  </form>
                </div>
              </div>
            <?php }
            ?>




          </div>


        </section>



      </div>

      <!-- ------------------------------------------------------------------------  -->

      <div class="container-pizzas">

        <section class="monte-pizza">
          <div class="separador">

            <div class="line-monte"></div>
            <h4>Bebidas alcoolicas</h4>

          </div>

          <div class="container-pizzas-monte">
            <?php

            $query = $pdo->query("SELECT * FROM bebida WHERE tipo = '1' AND NOT EXISTS ( SELECT * FROM promocao_bebida WHERE bebida.id = promocao_bebida.id_bebida)");
            $res11 = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($res11 as $pizza) {
              $id = $pizza['id'];
              $sabor = $pizza['nome'];
              $valor = $pizza['preco'];
              $descricao = $pizza['tipo'];
              $img = $pizza['img'];
              ?>

              <div class="card">

                <img src="<?php echo $img ?>" alt="Pizzas" class="foto_pizza"></img><!--Sabor do item-->


                <div class="itens-pizza">

                  <p id="sabor_pizza">
                    <?php echo $sabor ?>
                  </p><!--Sabor do item-->

                  <p class="preco_pizza">
                    <?php echo "R$ " . $valor ?>
                  </p> <!--Valor do item-->

                  <form action="carrinho.php" method="post">
                    <input type="number" value="1" name="quantidade" class="quantidade">

                    <input type="hidden" name="id_oculto" value="<?php echo $id ?>">

                    <input type="hidden" name="tipo" value="<?php echo 3 ?>">

                    <input type="submit" name="btt" value="Adicionar ao carrinho">
                  </form>
                </div>
              </div>
            <?php }
            ?>




          </div>


        </section>



      </div>


    </div>


  </main>

  <?php 
include('include_footer.php');
?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


    </script>
</body>

</html>