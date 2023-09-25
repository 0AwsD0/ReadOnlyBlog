<?php
$sql = "SELECT css_settings,header_text_color_settings,header_position_settings,header_image_uri_settings,header_image_settings,blog_name_settings,active_footer_settings,active_aside_settings  FROM rob_settings WHERE active_settings = 1";
    foreach ($conn->query($sql) as $row){
        $css_settings = $row['css_settings'];
        $header_text_color_settings = $row['header_text_color_settings'];
        $header_position_settings =$row['header_position_settings'];
        $header_image_uri_settings = $row['header_image_uri_settings'];
        $header_image_settings = $row['header_image_settings'];
        $blog_name_settings = $row['blog_name_settings'];
        $active_footer_settings = $row['active_footer_settings'];
        $active_aside_settings = $row['active_aside_settings'];
    }
?>