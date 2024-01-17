<?php
include_once("../PHP_Functions/Functions.php");
$u = new usuario();
$u->conectar();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cárdapio</title>
    <title>Michelangelo Pizzaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS_Pizzaria/cardapio.css" />
</head>

<body>
    <header> <!--Cabeçalho Pizzaria-->

        <div id="mainNavigation"> <!--Container do cabeçalho-->

            <nav role="navigation">
                <div class="py-2 text-center border-bottom">
                    <!--LOGO DA PIZZARIA-->
                    <div class="logo-flex">
                        <!--ctrl + k ,c  -->
                        <img src="../IMG/logopizza.png" alt="" class="invert">

                    </div>
                </div>
            </nav>

            <!--NAVBAR-->
            <div class="navbar-expand-md">
                <div class="navbar-dark text-center my-3">
                    <button style="border: none;" class="navbar-toggler w-70" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
                    </button>
                </div>

                <div class="text-center mt-lg-1 collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../HTML_Pizzaria/index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML_Pizzaria/carrinho.php" target="_blank">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">Entrar</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cardápio
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="cardapio.php">PIZZAS</a></li>
                            <li><a class="dropdown-item" href="cardapio_espiha.php">ESFIHAS</a></li>
                            <li><a class="dropdown-item" href="cardapio_bebida.php">BEBIDAS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main class="contato-principal">
        <div class="contato-title">
            <h1>Fale conosco</h1>
        </div>
        <section class="contato-telefone">
            <div class="contato-paragrafo">
                <h2>Contato</h2>
                <p>Entre em contao em um dos nossos contatos abaixo ou via formulário.</p>
            </div>
            <div class="contato-numero">

            </div>
        </section>

        <section>

        </section>
    </main>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


    </script>
</body>