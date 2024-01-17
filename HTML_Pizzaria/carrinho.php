<?php
include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();

session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
    exit();
}

if (isset($_POST["finalizar_compra"])) {

    $id_user = $_SESSION['id'];

    $resultado = array();
    foreach ($_SESSION['itens'] as $array) {
        $resultado[] = implode(' ', $array);
    }

    $stringFinal = implode(' ', $resultado);
    if (isset($_SESSION['cupom_nome'])) {
        $u->finalizarPedido($id_user, $_SESSION['total'], $_SESSION['cupom_nome'], $stringFinal);
    } else {
        $u->finalizarPedido($id_user, $_SESSION['total'], "Nenhum Cupom Usado", $stringFinal);
    }

    $sql = $pdo->query('DELETE FROM carrinho');
    header('location:pedido.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho</title>
    <title>Michelangelo Pizzaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet"> <!--load all styles -->
    <link rel="stylesheet" href="../CSS_Pizzaria/carrinho.css" />
</head>

<body>
    <?php

    include_once("include_header.php");

    ?>
    <div class="title">
        <div>
            <h1>Carrinho</h1>
        </div>
    </div>
    <main>
        <section class="carrinho container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_oculto = 0;
                    $total = 0;
                    if (isset($_POST['id_oculto'])) {
                        $id_oculto = $_POST['id_oculto'];
                        $tipo = $_POST['tipo'];
                        $quantidade = $_POST['quantidade'];

                        if ($tipo == 1) {
                            $query = $pdo->query("SELECT * FROM `pizza` WHERE id = $id_oculto");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($res as $valores) {
                                $id = $valores['id'];
                                $sabor = $valores['sabor'];
                                $valor = $valores['valor'];
                                $descricao = $valores['descricao'];
                                $img = $valores['imagem'];
                                $valor_total = $quantidade * $valor;
                                if (isset($_POST['novo_valor'])) {
                                    $novo_valor = $_POST['novo_valor'];
                                    $valor_total = $quantidade * $novo_valor;
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$novo_valor','$valor_total','$img')");
                                } else {
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$valor','$valor_total','$img')");
                                }
                            }
                        }
                        if ($tipo == 2) {
                            $query = $pdo->query("SELECT * FROM `esfirra` WHERE id = $id_oculto");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($res as $valores) {
                                $id = $valores['id'];
                                $sabor = $valores['sabor'];
                                $valor = $valores['preco'];
                                $descricao = $valores['descricao'];
                                $img = $valores['img'];
                                $valor_total = $quantidade * $valor;

                                if (isset($_POST['novo_valor'])) {
                                    $novo_valor = $_POST['novo_valor'];
                                    $valor_total = $quantidade * $novo_valor;
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$novo_valor','$valor_total','$img')");
                                } else {
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$valor','$valor_total','$img')");
                                }
                            }
                        }
                        if ($tipo == 3) {
                            $query = $pdo->query("SELECT * FROM `bebida` WHERE id = $id_oculto");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($res as $valores) {
                                $id = $valores['id'];
                                $sabor = $valores['nome'];
                                $valor = $valores['preco'];
                                $descricao = $valores['tipo'];
                                $img = $valores['img'];
                                $valor_total = $quantidade * $valor;

                                if (isset($_POST['novo_valor'])) {
                                    $novo_valor = $_POST['novo_valor'];
                                    $valor_total = $quantidade * $novo_valor;
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$novo_valor','$valor_total','$img')");
                                } else {
                                    $query = $pdo->query("INSERT INTO `carrinho`(`produto_id`, `nome_produto`,`quantidade`, `preco_unitario`, `subtotal`,img) VALUES ('$id','$sabor','$quantidade','$valor','$valor_total','$img')");
                                }
                            }
                        }
                    ?>
                        <?php

                        $query = $pdo->query("SELECT * FROM `carrinho`");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($res as $valores) {
                            $id = $valores['produto_id'];
                            $sabor = $valores['nome_produto'];
                            $valor = $valores['preco_unitario'];
                            $img = $valores['img'];
                            $sub = $valores['subtotal'];
                            $qua = $valores['quantidade'];
                            $total += $sub;

                            $itens[] = ['sabor' => $sabor, 'quantidade' => $qua, " | "];

                            $_SESSION['itens'] = ($itens);


                        ?>
                            <tr>
                                <th scope="row"><img src="<?php echo $img ?>" alt="" class="img_compra"></th>
                                <td>
                                    <?php echo $sabor ?>
                                </td>
                                <td>
                                    <?php echo $valor ?>
                                </td>
                                <td>
                                    <?php echo $qua ?>
                                </td>
                                <td>
                                    <?php echo $sub ?>
                                </td>
                            </tr>
                        <?php }
                    } else {

                        $query = $pdo->query("SELECT * FROM `carrinho`");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($res as $valores) {
                            $id = $valores['produto_id'];
                            $sabor = $valores['nome_produto'];
                            $valor = $valores['preco_unitario'];
                            $img = $valores['img'];
                            $sub = $valores['subtotal'];
                            $qua = $valores['quantidade'];
                            $total += $sub;

                            $itens[] = ['sabor' => $sabor, 'quantidade' => $qua, " | "];

                            $_SESSION['itens'] = ($itens);

                        ?>
                            <tr>
                                <th scope="row"><img src="<?php echo $img ?>" alt="" class="img_compra"></th>
                                <td>
                                    <?php echo $sabor ?>
                                </td>
                                <td>
                                    <?php echo $valor ?>
                                </td>
                                <td>
                                    <?php echo $qua ?>
                                </td>
                                <td>
                                    <?php echo $sub ?>
                                </td>
                            </tr>
                    <?php }
                    }
                    ?>


                </tbody>
            </table>
            <form action="#" method="post" class="limpacarrinho">
                <input type="submit" value="Limpar Carrinho" name="limpa_carrinho">
            </form>
            <?php
            if (isset($_POST['limpa_carrinho'])) {
                $query = $pdo->query('DELETE FROM carrinho');
            }

            ?>
        </section>
        <section class="total">
            <div class="info-total">
                <h2>Resumo da Compra</h2>
                <div class="particao">
                    <p>Sub-Total</p>
                    <p>
                        <?php echo "R$ ", $total ?>
                    </p>
                </div>
                <div class="particao">
                    <p>Frete</p>
                    <p>
                        <?php $frete = 10;
                        echo "R$ ", $frete, ",00";


                        ?>
                    </p>
                </div>
                <div class="particao" style="flex-direction: column;">

                    <form action="#" method="get" class="cupom">
                        <p>Cupom</p>
                        <div class="input-cupom">

                            <input type="text" name="cupom">
                            <input type="submit" value=" ">

                        </div>

                    </form>
                    <p class="result_cupom">
                        <?php
                        
                        if (isset($_GET['cupom'])) {
                            $cupom = $_GET["cupom"];
                            $query = $pdo->query("SELECT * FROM `cupom` where nome = '$cupom'");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            if (count($res) > 0) {
                                foreach ($res as $row) {
                                    $valor = $row['valor'];
                                    $_SESSION['cupom_nome'] = $row['nome'];
                                    $total = $total - ($total * $valor / 100);

                                    echo $result = "Cupom Válido";
                                    
                                }
                            } else {

                                echo $result = "Cupom Inválido";
                                
                            }
                            if ($result == "Cupom Válido"){
                                ?>
                                <style>
                                    .result_cupom{
                                        color: green;
                                    }
                                </style><?php
                            }
                        }

                        ?>

                    </p>
                </div>
                <div class="particao_total">
                    <p>Total</p>
                    <p>
                        <?php
                        $_SESSION['total'] = $total + $frete;
                        if ($total + $frete == 10) {
                            echo "Nenhum item selecionado";
                        } else {
                            echo "R$ ", number_format($_SESSION['total']);
                        } ?>
                    </p>
                </div>


            </div>

            <div class="total-btn">
                <form action="#" method="post">

                    <input type="submit" value="Finalizar Compra" name="finalizar_compra">

                </form>
            </div>
        </section>
    </main>




    <?php
    include('include_footer.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


    </script>
</body>

</html>