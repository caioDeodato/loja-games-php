<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Resultado da operação</title>
    <?php
        include('../model/usuario.php');
        session_start();

        if(!isset($_SESSION['usuario'])){
            header("Location: http://localhost/loja-games/pages/login.php");
            exit();
        } else {
            $usuario = new Usuario();
            $usuario = unserialize($_SESSION['usuario']);
        }
    ?>
</head>
<body>
    <nav class="navbar navbar-light bg-dark" style="display: flex; border-radius: 0px 0 10px 10px;">
        <a class="navbar-brand text-white" href="./index.php">GameStore</a>
        <div class="canto" style="display: flex">
            <a class="nav-link text-white" href="./login.php"><?php echo $usuario->nome; ?></a>
            <a class="nav-link text-danger" style="color: red;" href="../controller/logoff.php">Sair</a>
        </div>
    </nav>

    <div class="container" style="margin-top: 50px;">
        <?php 
            if(!empty($_SESSION['msgIndex'])): 
        ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Operação bem sucedida!</h4>
                <p><?php echo $_SESSION['msgIndex'] ?></p>
                <hr>
                <p class="mb-0">Você poderá voltar para a página inicial e comprar mais jogos clicando no nome da loja</p>
            </div>

        <?php 
            unset($_SESSION['msgIndex']);
            endif; 
        ?>

        <?php if(!empty($_SESSION['erroIndex'])): ?>

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Operação não realizada</h4>
                <p><?php echo $_SESSION['erroIndex'] ?></p>
                <hr>
                <p class="mb-0">Você poderá voltar para a página inicial e comprar mais jogos clicando no nome da loja</p>
            </div>
        
        <?php 
            unset($_SESSION['erroIndex']);
            endif; 
        ?> 
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>