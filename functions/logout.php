<?php
    session_start();

    if( ! isset($_SESSION['logged_in']) || ! isset($_SESSION['csrf_token'])){
        exit('<h1> 405 Method Not Allowed </h1>');
    }

    $_SESSION['logged_in'] = false;// <- if line below malfunction or smth
    session_destroy();
    header('Location: ../index.php');
?>