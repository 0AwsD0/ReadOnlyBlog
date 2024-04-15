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
    add_into_log('error', 'CSRF ERROR - edit_add_block.php'.$e->getMessage());
    $conn = null;
    exit('<h1>CSRF TOKEN ERROR</h1>');
 }

 try{
    $block_type = $_POST['add_block_type'];
    $id_post = $_POST['id_post'];
    $order = $_POST['order'];
    $sql = "INSERT INTO `rob_post_content` (`id_post_content`, `id_post`, `order_post_content`, `data_type_post_content`, `content_post_content`) VALUES (NULL, '".$id_post."', '".$order."', '".$block_type."', '');";
    $query = $conn->prepare($sql);
    $query -> execute();

    add_into_log('admin', 'Added block into post id='.$id_post.' - ');

    $conn = null;
 }
 catch(Exception $e){
     echo "Error: " . $e->getMessage();
     add_into_log('error', '!!!CRITICAL ERROR!!! in -> Edit.php -> changes not saved! - '.$e->getMessage());
     $conn = null;
 }

?>
//recive post ID and new block type