<?php
include_once("../PHP_Functions/conexao.php");
$u = new usuario();
$u->conectar();
$query = $pdo -> query("SELECT * FROM promocao_pizza ");
$res = $query->fetchAll();

echo"<pre>";
print_r($res);
echo"<pre>";

$pizza = $pdo -> query("SELECT * FROM `pizza`");
$res_pizza = $query->fetchAll();

echo"<pre>";
print_r($res_pizza);
echo"<pre>";
?>
<html>
    
</html>