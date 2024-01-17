<?php


session_start();
if(isset($_POST['confirma'])){
    session_destroy();
    header('location:home.php');
    exit();
}
else if (isset($_POST['nao_confirma'])){
    header('location:home.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Michelangelo Pizzaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS_Pizzaria/sair.css">
</head>

<body>

    <section class="logout">
        <div class="logout-box">
            <div class="logout-pergunata">
                <p>Você tem certeza que deseja sair?</p>
            </div>
            <div class="logout-button">
                <form action="#" method="post">
                    <input type="submit" name="confirma" value="sim">
                    <input type="submit" name="nao_confirma" value="não">
                </form>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


    </script>
</body>

</html>

