<?php
require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    try{
        $sql = "SELECT * FROM rob_settings"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
        foreach ($conn->query($sql) as $row){
              $id_settings = $row['id_settings'];
              $header_text_color_settings = $row['header_text_color_settings'];
              $css_settings = $row['css_settings'];
              $header_position_settings = $row['header_position_settings'];
              $header_image_uri_settings = $row['header_image_uri_settings'];
              $header_image_settings = $row['header_image_settings'];
              $active_settings = $row['active_settings'];
              $blog_name_settings = $row['blog_name_settings'];
              $active_footer_settings = $row['active_footer_settings'];
              $active_aside_settings = $row['active_aside_settings'];
              require('get_settings_set_for_admin_panel.php');
            }
      $conn = null;
    }
  catch(Exception $e) {
      echo "Error: " . $e->getMessage();
      add_into_log('error', 'Admin panel main ERROR - '.$e->getMessage());
      $conn = null;
  }
      $conn = null;
?>