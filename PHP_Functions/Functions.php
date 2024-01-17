<?php
class usuario
{
    private $pdo;
    function conectar()
    {
        global $pdo;
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "pizzaria";
        $pdo = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
        return true;
    }

    function cad_produto($nome, $descricao= "Algo", $preco, $img, $tipo, $valor_extra = 1)
    {
        global $pdo;
        if ($tipo == "pizza") {
            $sql = $pdo->prepare("INSERT INTO `pizza`(`imagem`, `sabor`, `valor`, `descricao`) VALUES ('$img','$nome','$preco','$descricao')");
            $sql->execute();
        } else if ($tipo == "esfiha") {
            $sql = $pdo->prepare("INSERT INTO `esfirra`(`img`, `sabor`, `preco`,`doce_salgada` ,`descricao`) VALUES ('$img','$nome','$preco',$valor_extra,'$descricao')");
            $sql->execute();
        } else if ($tipo == "bebida") {
            $sql = $pdo->prepare("INSERT INTO `bebida`(`nome`, `preco`, `tipo`,`img`) VALUES ('$nome','$preco',$valor_extra,'$img')");
            $sql->execute();
        }
    }
    function cad_promocao($nome, $valor, $tipo)
    {
        global $pdo;

        if ($tipo == "pizza") {
            $sql = $pdo->prepare("INSERT INTO `promocao_pizza`(id_pizza, valor_promo) VALUES ($nome, $valor)");
            
        }
        else if ($tipo == "esfiha") {
            $sql = $pdo->prepare("INSERT INTO `promocao_esfiha`(id_esfiha, valor_promo) VALUES ($nome, $valor)");
            
        }
        else if ($tipo == "bebida") {
            $sql = $pdo->prepare("INSERT INTO `promocao_bebida`(id_bebida, valor_promo) VALUES ($nome, $valor)");
            
        }
        $sql->execute();
    }

    function cad_igredientes($nome, $preco, $img, $tipo)
    {
        global $pdo;

        if ($tipo == "queijo") {
            $sql = $pdo->prepare("INSERT INTO `queijos`(`nome`, `preco`, `img`) VALUES ('$nome',$preco,'$img')");
            $sql->execute();
        } else if ($tipo == "molho") {
            $sql = $pdo->prepare("INSERT INTO `molhos`(`nome`, `preco`, `img`) VALUES ('$nome',$preco,'$img')");
            $sql->execute();
        } else if ($tipo == "vegetais") {
            $sql = $pdo->prepare("INSERT INTO `vegetais`(`nome`, `preco`, `img`) VALUES ('$nome',$preco,'$img')");
            $sql->execute();
        } else if ($tipo == "proteinas") {
            $sql = $pdo->prepare("INSERT INTO `proteinas`(`nome`, `preco`, `img`) VALUES ('$nome',$preco,'$img')");
            $sql->execute();
        } else {
            $sql = $pdo->prepare("INSERT INTO `ervas_temperos`(`nome`, `preco`, `img`) VALUES ('$nome',$preco,'$img')");
            $sql->execute();
        }
    }


    public function cadastrar($nome, $endereco, $tel, $cpf, $email, $senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM clientes WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO clientes (nome, endereco, telefone, cpf, email, senha) VALUES (:n, :en, :t, :c, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":en", $endereco);
            $sql->bindValue(":t", $tel);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
    }


    public function logar($email, $senha)
    { //FUNCAO LOGAR
        global $pdo;
        $sql = $pdo->prepare("select * from clientes where email=:e and senha=:s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            session_start();
            $_SESSION['id'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];

            return true;
        } else {
            return false;
        }
    }

    public function finalizarPedido($id_user, $valor_total,$cupom, $itens_pedidos)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO `pedido`(`id_cliente`, `itens_pedidos`,`nome_cupom`, `valor_total`) VALUES ('$id_user','$itens_pedidos','$cupom','$valor_total')");
        $sql->execute();
    }


}
