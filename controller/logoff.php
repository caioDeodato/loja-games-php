<?php

    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['lista']);
    $_SESSION['msg'] = "Logout realizado";
    header("Location: http://localhost/loja-games/pages/login.php");