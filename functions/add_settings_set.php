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
    require('../logs/log.php');

    $sql = "INSERT INTO `rob_settings` (`id_settings`, `header_text_color_settings`, `header_position_settings`, `header_image_uri_settings`, `header_image_settings`, `active_settings`, `blog_name_settings`, `active_footer_settings`, `active_aside_settings`, `css_settings`, `admin_panel_css_settings`) VALUES (NULL, '\'black\'', '\'center\'', '\'img/header.jpg\'\'', '\'cover\'', '0', 'Read Only Blog', '0', '0', 'old_grey_', 'white_')";
    $conn -> query($sql);

    $conn = null;

    add_into_log('admin', 'Settings set added');

    header('Location: ../admin_panel.php');

?>