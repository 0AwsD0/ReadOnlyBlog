<?php
 session_start();

 if( ! isset($_SESSION['logged_in']) || ! isset($_SESSION['csrf_token'])){
     exit('<h1> 405 Method Not Allowed </h1>');
 }

 if(!($_SESSION['logged_in'] == true)){
     echo('<h1>You are not loged in!</h1><br>');
     exit('<h1>Log in first to access tis page!</h1>');
 }

    require('dbconn.php');
    //require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    require('../logs/log.php');

    if(!($_SESSION['csrf_token_settings']) || $_SESSION['csrf_token_settings'] != $_POST['csrf_token_settings'] )
    {
       add_into_log('error', 'CSRF ERROR - settings_delete.php');
       exit('<h1>CSRF TOKEN ERROR</h1>');
    }

    $id_settings = $_POST['id_settings'];

try{
    $sql = "DELETE FROM `rob_settings` WHERE id_settings = $id_settings";
    $query= $conn->prepare($sql);
    $query -> execute();

    $conn = null;
}
catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    add_into_log('error', 'Settings delete ERROR - '.$e->getMessage());
    $conn = null;
}
    add_into_log('admin', 'Settings DELETED');

    header('Location: ../admin_panel.php');
?>