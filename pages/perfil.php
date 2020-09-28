<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <?php 
        include('../controller/compra_controller.php');

        // Redireciona o usuario para a tela de login se nao houver um usuario na sessao do navegador
        session_start();

        if(!isset($_SESSION['usuario'])){
            header("Location: http://localhost/loja-games/pages/login.php");
            exit();
        } else {
            $usuario = new Usuario();
            $usuario = unserialize($_SESSION['usuario']);
            $controller = new CompraController();
            $compras = $controller->listarTodas($usuario->id);
            $jogosObtidos[] = new Game();

            $jogosObtidos = $controller->listarGamesComprados($usuario->id);
        }
    ?>
    <title><?php echo "Perfil: ". $usuario->nome ?></title>
</head>
<body>
    
    <nav class="navbar navbar-light bg-dark" style="display: flex; border-radius: 0px 0 10px 10px;">
        <a class="navbar-brand text-white" href="./index.php">GameStore</a>
        <div class="canto" style="display: flex">
            <a class="nav-link text-white" href="#"><?php echo $usuario->nome; ?></a>
            <a class="nav-link text-danger" style="color: red;" href="../controller/logoff.php">Sair</a>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid " style="margin: 40px;">
        <div class="container">
            <h1 class="display-4">Perfil</h1>
            <p class="lead">Aqui é onde poderá listar todos os jogos comprados junto á data deles.</p>
        </div>
    </div>

    <!-- Parte responsavel por fazer a listagem de todos os jogos do banco de dados -->

    <div class="container">

        <div class="lista" style="display: flex; flex-wrap: wrap; justify-content: center;">
            <?php if(count($compras) == 1): ?>
                <div class="alert alert-danger" role="alert">
                    Você ainda não possui nenhum jogo, retorne para a página inicial e adiquira novos
                </div>
            <?php else: ?>
            <?php
                $count = 0; // para evitar que os valores n dupliquem
                for($i = 0; $i < count($compras); $i++): //como nao da pra rodar dois foreach ao mesmo tempo, utilizei o for normal e o incremento a cada vez q ele ler um jogo obtido
                foreach ($jogosObtidos as $game):
                    if($game->id != null && $compras[$i]->id != null && $count != count($compras) - 1):
            ?>
                <div class="card" style="width: 18rem; margin: 25px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $game->nome ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo ucfirst($game->categoria) . "   /   $game->plataforma"; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php 
                                echo "Data da compra: ". $compras[$i]->data_compra;
                                $i++;
                            ?>
                        </h6>
                        <p class="card-text" style=""><?php echo $game->descricao; ?></p>

                    </div>
                </div>
            <?php
                $count++; 
                endif;
                endforeach; 
                endfor;
                endif;
            ?>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>