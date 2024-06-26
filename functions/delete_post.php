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


    if(!($_SESSION['csrf_token_edit_post']) || $_SESSION['csrf_token_edit_post'] != $_GET['csrf_token_edit_post'] )
    {
    add_into_log('error', 'CSRF ERROR - delete_post.php');
    $conn = null;
    exit('<h1>CSRF TOKEN ERROR</h1>');
    }

try{
    //requires -> ON DELETE CASCADE (same ass for settings -> subpage  //footer and aside are not conected to settings) //before deleted already made fk0 -> ALTER TABLE `rob_post_content` ADD CONSTRAINT `rob_post_content_fk0` FOREIGN KEY (`id_post`) REFERENCES `rob_post`(`id_post`) ON DELETE CASCADE ON UPDATE NO ACTION;
    $id_post = $_GET['id_post'];
    $sql = "DELETE FROM rob_post WHERE id_post = $id_post";
    $query= $conn->prepare($sql);
    $query -> execute();

    $conn = null;
}
catch(Exception $e) {
    echo ("Error: " . $e->getMessage());
    add_into_log('error', 'Post deletion ERROR - '.$e->getMessage());
    $conn = null;
}
    add_into_log('admin', 'Post ID = '.$id_post.' deleted');
    header('Location: ../edit_post.php');
?>