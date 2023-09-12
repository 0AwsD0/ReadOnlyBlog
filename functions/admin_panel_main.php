<?php
    require('dbconn.php');

    try{
        $sql = "SELECT * FROM rob_settings"; //id_setings header_position_settings header_image_settings active_settings blog_name_settings active_footer_social_settings active_aside_settings
        foreach ($conn->query($sql) as $row){
                echo(
                    '
                    <h1>Settings Set</h1>
                    <h4>Settings set NO: '
                    . $row['id_setings'].
                    '</h4>
                    <h4>Header possition: '
                    . $row['header_position_settings'].
                    '</h4>
                    <h4>Header image settings: '
                    .$row['header_image_settings'].
                    '</h4>
                    <h4>Is settings set active?: '
                    .$row['active_settings'].
                    '</h4>
                    <h4>Header name of the website: '
                    .$row['blog_name_settings'].
                    '</h4>
                    <h4>Are socials on the footer active?: '
                    .$row['active_footer_social_settings'].
                    '</h4>
                    <h4>Is aside element active?: '
                    .$row['active_aside_settings'].
                    '</h4>'
                    );
            }
            $conn = null;
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      $conn = null;
    }

?>