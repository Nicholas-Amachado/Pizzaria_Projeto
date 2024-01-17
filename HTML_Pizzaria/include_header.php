<style>
    .container_user {
        color: aliceblue;
        position: absolute;
        top: 20px;
        right: 170px;
        display: flex;
        align-items: center;
    }

    #navbarNavDropdown.collapsing .navbar-nav, #navbarNavDropdown.show .navbar-nav {
    background: #e90a0a;
    padding: 12px;
    position: relative;
}

    .container_user img {
        width: 50px;
    }

    label {
        margin-top: 2px;
        color: white;
    }

    <?php
    if (isset($_SESSION["nome"])) { ?>
        header {
            height: 210px;
            background-color: red;
        }

    <?php } ?>
</style>
<header> <!--Cabeçalho Pizzaria-->

    <div id="mainNavigation"> <!--Container do cabeçalho-->
        <div class="container_user">

            <?php
            if (isset($_SESSION['nome'])) {
                // if (isset($_SESSION['nome'])) { ?>

                <img src="../IMG/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8-removebg-preview.png" alt="">
                <label>
                    <?php

                    echo $_SESSION['nome'];

                    ?>
                </label>
            <?php } //} ?>

        </div>
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
                <button style="border: none;" class="navbar-toggler w-70" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
                </button>
            </div>

            <div class="text-center mt-lg-1 collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php" target="_blank">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../HTML_Pizzaria/carrinho.php" target="_blank">Carrinho</a>
                    </li>
                    <li class="nav-item">

                        <?php
                        if (isset($_SESSION['id'])) { ?>
                            <a class="nav-link" href="logout.php" target="_blank">Sair</a>
                        <?php } else { ?>
                            <a class="nav-link" href="login.php" target="_blank">Entrar</a>
                        <?php } ?>



                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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