<?php
include_once("../PHP_Functions/Functions.php");

$u = new usuario();

if ($u->conectar()) {

    if (isset($_FILES['imagem'])  && !empty($_FILES['imagem'])  && !empty($_POST['nome'])  && !empty($_POST['preco'])  && !empty($_POST['descricao'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $img = $_FILES['imagem'];

        $img = "../upload_Img_Pizzas/" . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], $img);
        if (isset($_POST['escolha'])) {
            $valor_escolha = $_POST['escolha'];
            if ($valor_escolha == 'pizza') {
                $u->cad_produto($nome, $descricao, $preco, $img, $valor_escolha);
            }
            if ($valor_escolha == 'esfiha') {
                $doce_salgada = $_POST['esfiha_tipo'];
                if ($doce_salgada == 'doce') {
                    $num_doce_sal = 2;
                    echo "Doce ", $num_doce_sal;
                }
                if ($doce_salgada == 'salgada') {
                    $num_doce_sal = 1;
                    echo "salgada ", $num_doce_sal;
                }
                $u->cad_produto($nome, $descricao, $preco, $img, $valor_escolha, $num_doce_sal);
            }

            if ($valor_escolha == 'bebida') {
                $doce_salgada = $_POST['bebida_tipo'];
                if ($doce_salgada == 'alcoolica') {
                    $alcool = 1;
                    echo "Doce ", $alcool;
                }
                if ($doce_salgada == 'nao_alcoolica') {
                    $alcool = 2;
                    echo "salgada ", $alcool;
                }
                $u->cad_produto($nome, $descricao, $preco, $img, $valor_escolha, $alcool);
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <select required name="escolha" onchange="mostrarInput()" id="opcao">
            <option>Selecione</option>
            <option value="pizza">Pizza</option>
            <option value="esfiha">Esfiha</option>
            <option value="bebida">Bebidas</option>
        </select>

        <input type="text" name="nome" placeholder="Nome">

        <input type="text" name="descricao" placeholder="Descrição">

        <input type="text" name="preco" placeholder="Preço">

        <input type="file" name="imagem" accept="image/*">

        <input type="submit" value="Cadastrar">

        <div id="input_esfiha" class="hidden">
            <label>
                <input type="radio" name="esfiha_tipo" value="doce"> Doce
            </label>

            <label>
                <input type="radio" name="esfiha_tipo" value="salgada"> Salgada
            </label>

        </div>


        <div id="input_bebida" class="hidden">
            <label>
                <input type="radio" name="bebida_tipo" value="alcoolica"> Alcoolica
            </label>

            <label>
                <input type="radio" name="bebida_tipo" value="nao_alcoolica"> Não-Alcoolica
            </label>

        </div>

    </form>
</body>

<script>
        function mostrarInput() {
            var opcaoSelecionada = document.getElementById("opcao").value;

            document.getElementById("input_bebida").classList.add("hidden");
            document.getElementById("input_esfiha").classList.add("hidden");

            document.getElementById("input_" + opcaoSelecionada).classList.remove("hidden");
        }
    </script>

</html>