<?php
    //Página responsável por receber os dados do form de login ou de cadastro e fazer as devidas funcionalidades
    include('../controller/usuario_controller.php');
    $controller = new UsuarioController();

    session_start();

    $funcao = $_GET['form'];

    if($funcao == "login"){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $valor = $controller->validarLogin($email, $senha);

        if($valor != null) {

            $_SESSION['usuario'] = serialize($valor);
            header("Location: http://localhost/loja-games/pages/index.php");
            exit();
        } else {

            $_SESSION['erro'] = "Erro no processo de login, tente novamente";
            header("Location: http://localhost/loja-games/pages/login.php");
            exit();
        }

    } elseif($funcao == 'cadastrar') {

        $usuario = new Usuario();

        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $controller->salvar($usuario);

        $_SESSION['usuario'] = serialize($usuario);
        $_SESSION['msg'] = "Cadastro efetuado com sucesso! Agora faça seu login";
        header("Location: http://localhost/loja-games/pages/login.php");
        exit();
    }

    
