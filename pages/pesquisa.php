<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <?php 
        include('../model/usuario.php');
        include('../controller/game_controller.php');

        // Redireciona o usuario para a tela de login se nao houver um usuario na sessao do navegador
        session_start();

        if(!isset($_SESSION['usuario'])){
            header("Location: http://localhost/loja-games/pages/login.php");
            exit();
        } else {
            $usuario = new Usuario();
            $usuario = unserialize($_SESSION['usuario']);
            $controller = new GameController();
            $game = new Game();

            $categEscolhida = $_GET['categ'];
        }
    ?>
    <title><?php echo "Pesquisa: ". ucfirst($categEscolhida) ?></title>
</head>
<body>
    
    <nav class="navbar navbar-light bg-dark" style="display: flex; border-radius: 0px 0 10px 10px;">
        <a class="navbar-brand text-white" href="./index.php">GameStore</a>
        <div class="canto" style="display: flex">
            <a class="nav-link text-white" href="./login.php"><?php echo $usuario->nome; ?></a>
            <a class="nav-link text-danger" style="color: red;" href="../controller/logoff.php">Sair</a>
        </div>
    </nav>

    <!-- Separa uma div caso exista alguma mensagem ou erro pra ser mostrado ao usuario -->
    <?php 
        if(!empty($_SESSION['msgIndex'])):
    ?>

        <div class="alert alert-success" role="alert" style="margin-bottom: 35px; text-align: center;">
            <?php echo $_SESSION['msgIndex']; ?>
        </div>

    <?php 
        unset($_SESSION['msgIndex']);
        endif; 
    ?>

    <?php if(!empty($_SESSION['erroIndex'])): ?>

        <div class="alert alert-danger" role="alert" style="margin-bottom: 35px; text-align: center;">
            <?php echo $_SESSION['erroIndex']; ?>
        </div>
       
    <?php 
        unset($_SESSION['erroIndex']);
        endif; 
    ?> 

    <!-- Parte responsavel por fazer a listagem de todos os jogos do banco de dados -->

    <div class="container">

        <div class="categorias" style=" margin-top: 20px; padding: 20px; margin-left: 25px; border: 1px solid grey; border-radius: 10px;">

            <?php if($categEscolhida == "ação"): ?>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                    <a class="nav-link" href="./index.php">Todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Ação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pesquisa.php?categ=aventura">Aventura</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pesquisa.php?categ=corrida">Corrida</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pesquisa.php?categ=terror">Terror</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pesquisa.php?categ=tiro">Tiro</a>
                    </li>
                </ul>

                <?php elseif($categEscolhida == "aventura"): ?>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php">Todos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=ação">Ação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Aventura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=corrida">Corrida</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=terror">Terror</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=tiro">Tiro</a>
                        </li>
                    </ul>
                <?php elseif($categEscolhida == "corrida"): ?>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php">Todos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=ação">Ação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=aventura">Aventura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Corrida</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=terror">Terror</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=tiro">Tiro</a>
                        </li>
                    </ul>

                <?php elseif($categEscolhida == "terror"): ?>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php">Todos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./pesquisa.php?categ=ação">Ação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=aventura">Aventura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=corrida">Corrida</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Terror</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=tiro">Tiro</a>
                        </li>
                    </ul>
                <?php elseif($categEscolhida == "tiro"): ?>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                        <a class="nav-link" href="./index.php">Todos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=ação">Ação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=aventura">Aventura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=corrida">Corrida</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesquisa.php?categ=terror">Terror</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Tiro</a>
                        </li>
                    </ul>
                <?php endif; ?>
        </div>

        <div class="lista" style="display: flex; flex-wrap: wrap; justify-content: center;">
            <?php 
                $lista = $controller->listarPorCategoria($categEscolhida);
                foreach ($lista as $game):
                    if(!$game->id == null):
            ?>
                <div class="card" style="width: 18rem; margin: 25px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $game->nome ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo ucfirst($game->categoria) . "   /   $game->plataforma"; ?></h6>
                        <p class="card-text" style=""><?php echo $game->descricao; ?></p>
                        <?php 
                            // Deixando botão azul para jogos de PS4 e verde para XONE
                            if(strcasecmp($game->plataforma, "xbox one")){
                                echo '<a href="./comprar.php?gameid='.$game->id.'&userid='.$usuario->id.'" class="btn btn-outline-primary">Comprar</a>';
                            } else {
                                echo '<a href="./comprar.php?gameid='.$game->id.'&userid='.$usuario->id.'" class="btn btn-outline-success">Comprar</a>';
                            } 
                        ?>
                    </div>
                </div>
            <?php 
                endif;
                endforeach; ?>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>