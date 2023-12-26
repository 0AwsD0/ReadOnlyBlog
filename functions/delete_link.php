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
    //require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    require('../logs/log.php');

try{
    $id_footer = $_POST['id_footer'];
    $sql = "DELETE FROM rob_footer WHERE id_footer = $id_footer";
    $query= $conn->prepare($sql);
    $query -> execute();

    $conn = null;
}
catch(Exception $e) {
    echo ("Error: " . $e->getMessage());
    add_into_log('error', 'Link deletion ERROR - '.$e->getMessage());
    $conn = null;
}
    add_into_log('admin', 'Link deleted');

    header('Location: ../admin_panel.php');
?>