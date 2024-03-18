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
       add_into_log('error', 'CSRF ERROR - add_settings_set.php');
       exit('<h1>CSRF TOKEN ERROR</h1>');
    }

try{
    $sql = "INSERT INTO `rob_settings` (`id_settings`, `header_text_color_settings`, `header_position_settings`, `header_image_uri_settings`, `header_image_settings`, `active_settings`, `blog_name_settings`, `active_footer_settings`, `active_aside_settings`, `css_settings`, `admin_panel_css_settings`) VALUES (NULL, '\'black\'', '\'center\'', '\'img/header.jpg\'\'', '\'cover\'', '0', 'Read Only Blog', '0', '0', 'old_grey_', 'white_')";
    $conn -> query($sql);

    $conn = null;
}
catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    add_into_log('error', 'Add settings set ERROR - '.$e->getMessage());
    $conn = null;
}
    add_into_log('admin', 'Settings set added');

    header('Location: ../admin_panel.php');

?>