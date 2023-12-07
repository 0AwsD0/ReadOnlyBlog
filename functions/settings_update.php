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
    require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');

    $id_settings = $_POST['id_settings'];
    $header_text_color_settings = $_POST['header_text_color_settings'];
    $header_position_settings = $_POST['header_position_settings'];
    $header_image_uri_settings = $_POST['header_image_uri_settings'];
    $header_image_settings = $_POST['header_image_settings'];
    $blog_name_settings = $_POST['blog_name_settings'];
    $css_settings = $_POST['css_settings'];
    $admin_panel_css_settings = $_POST['admin_panel_css_settings'];

    if(!isset($_POST['active_settings'])){
        $active_settings = 0;
    }
    else{
        $active_settings = 1;
    }

    if(!isset($_POST['active_aside_settings'])){
        $active_aside_settings = 0;
    }
    else{
        $active_aside_settings = 1;
    }

    if(!isset($_POST['active_footer_settings'])){
        $active_footer_settings = 0;
    }
    else{
        $active_footer_settings = 1;
    }

echo('  DEBUG:  '.$header_position_settings);
echo('  DEBUG:  '.$header_image_uri_settings);

try{
    $sql = "UPDATE `rob_settings` SET `header_text_color_settings` = '$header_text_color_settings', `header_position_settings` = '$header_position_settings', `header_image_uri_settings` = '$header_image_uri_settings', `header_image_settings` = '$header_image_settings', `active_settings` = $active_settings, `blog_name_settings` = '$blog_name_settings', `active_footer_settings` = $active_footer_settings, `blog_name_settings` = '$blog_name_settings', `active_footer_settings` = $active_footer_settings, `active_aside_settings` = $active_aside_settings, `css_settings` = '$css_settings', `admin_panel_css_settings` = '$admin_panel_css_settings'  WHERE `id_settings` = $id_settings";
    $query= $conn->prepare($sql);
    $query -> execute();
    $conn = null;
}
catch(Exception $e) {
        echo "Error: " . $e->getMessage();
        add_into_log('error', 'Settings update ERROR - '.$e->getMessage());
        $conn = null;
      }

    add_into_log('admin', 'Settings updated');

    header('Location: ../admin_panel.php');
?>