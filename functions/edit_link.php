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

    $id_footer = $_POST['id_footer'];
    $name_footer = $_POST['name_footer'];
    $link_footer = $_POST['link_footer'];
    $image_footer = $_POST['image_footer'];
        if(!isset($_POST['is_enabled_footer'])){
            $is_enabled_footer = 0;
        }
        else{
            $is_enabled_footer = 1;
        }

    $sql = "UPDATE `rob_footer` SET `is_enabled_footer` = $is_enabled_footer, `name_footer` = '$name_footer', `link_footer` = '$link_footer', `image_footer` = '$image_footer' WHERE `id_footer` = $id_footer";
    $query= $conn->prepare($sql);
    $query -> execute();

    $conn = null;
    //header('Location: ../admin_panel.php');
?>