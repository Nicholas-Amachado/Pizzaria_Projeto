<?php


include_once("../PHP_Functions/Functions.php");

$u = new usuario();

if ($u->conectar()) {

    if (isset($_FILES['imagem'])  && !empty($_FILES['imagem'])  && !empty($_POST['nome'])  && !empty($_POST['preco'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $img = $_FILES['imagem'];

        $img = "../upload_Img_Pizzas/" . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], $img);

        if (isset($_POST['escolha'])) {
            $valor_escolha = $_POST['escolha'];
            $u->cad_igredientes($nome, $preco, $img,$valor_escolha);
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

</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <select required name="escolha">
            <option>Selecione</option>
            <option value="queijo">Queijo</option>
            <option value="molho">Molho</option>
            <option value="vegetais">Vegetais</option>
            <option value="proteinas">Proteinas</option>
            <option value="ervas_temperos">Ervas e Temperos</option>
        </select>

        <input type="text" name="nome" placeholder="Nome">


        <input type="text" name="preco" placeholder="Preço">

        <input type="file" name="imagem" accept="image/*">

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>



