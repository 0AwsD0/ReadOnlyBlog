<?php
 session_start();

 if( ! isset($_SESSION['logged_in']) || ! isset($_SESSION['csrf_token'])){
     exit('<h1> 405 Method Not Allowed </h1>');
 }

 //echo('Admin panel.');
 if(!($_SESSION['logged_in'] == true)){
     echo('<h1>You are not loged in!</h1><br>');
     exit('<h1>Log in first to access tis page!</h1>');
 }
 else{
     //echo('Session is present!');
 }

    require('dbconn.php');

    $sql = "INSERT INTO `rob_footer` (`id_footer`, `is_enabled_footer`, `name_footer`, `link_footer`, `image_footer`) VALUES (NULL, '1', 'LINK', '#', 'img/ico/link.png')";
    $conn -> query($sql);

    $conn = null;
    header('Location: ../admin_panel.php');
?>