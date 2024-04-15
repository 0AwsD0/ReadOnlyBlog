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
 require('../logs/log.php');

 if($_SESSION['csrf_token_editor'] != $_POST['csrf_token_editor'] || ! isset($_SESSION['csrf_token_editor']) || ! isset($_POST['csrf_token_editor'])){
    echo('<h1>CSRF TOKEN ERROR</h1><br>');
    add_into_log('error', 'CSRF ERROR - edit_delete_block.php'.$e->getMessage());
    $conn = null;
    exit('<h1>CSRF TOKEN ERROR</h1>');
 }

 try{
    $conn = null;
 }
 catch(Exception $e){
     echo "Error: " . $e->getMessage();
     add_into_log('error', '!!!CRITICAL ERROR!!! in -> Edit.php -> changes not saved! - '.$e->getMessage());
     $conn = null;
 }

?>
//recive post ID and new block type