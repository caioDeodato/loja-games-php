<?php
    include('../controller/compra_controller.php');
    date_default_timezone_set('America/Sao_Paulo');
    session_start();
    $controller = new CompraController();
    
    $id_usuario = $_GET['userid'];
    $id_jogo = $_GET['gameid'];
    $data = date('d-m-Y H:i');

    $controller->salvar($id_jogo, $id_usuario, $data);
    $_SESSION['msgIndex'] = "Compra realizada com sucesso! O jogo já está disponível para visualização na aba do seu Perfil";
    header('Location: http://localhost/loja-games/pages/resultado.php');
    exit();
        

        

