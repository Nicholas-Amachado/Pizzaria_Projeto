<?php
include_once("../PHP_Functions/Functions.php");

$u = new usuario();

if($u->conectar() && isset($_POST['id'])){
    $id = $_POST['id'];
    $valor = $_POST['valor'];
    if (!empty($id) && !empty($valor) ) {
        if (isset($_POST['escolha'])) {
            $valor_escolha = $_POST['escolha'];
            $u->cad_promocao($id, $valor,$valor_escolha);
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
    <form action="" method="post">
    <select required name="escolha">
            <option>Selecione</option>
            <option value="pizza">Pizza</option>
            <option value="esfiha">Esfiha</option>
            <option value="bebida">Bebidas</option>
        </select>
        <input type="number" name="id" placeholder="Id do Produto">
        <input type="text" name="valor" placeholder="Valor da Promoção">
        <input type="submit" value="Cadastrar Promoção">
    </form>
</body>
</html>