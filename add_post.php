<?php
    session_start();

    if( ! isset($_SESSION['logged_in']) || ! isset($_SESSION['csrf_token'])){
        exit('<h1> 405 Method Not Allowed </h1>');
    }

    if(!($_SESSION['logged_in'] == true)){
        echo('<h1>You are not loged in!</h1><br>');
        exit('<h1>Log in first to access tis page!</h1>');
    }

    require('functions/dbconn.php');
    require('logs/log.php');

    try{
        $sql = "SELECT admin_panel_css_settings FROM rob_settings WHERE active_settings = 1"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
        foreach ($conn->query($sql) as $row){
            $admin_panel_css_settings = $row['admin_panel_css_settings'];
        }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      add_into_log('error', 'Add post ERROR - '.$e->getMessage());
      $conn = null;
      exit('ERROR - Check logs -> error.log');
    }
//SQL adding newpost - disabled visibility + redirect to deitor woth new post ID
    $sql = "INSERT INTO `rob_post`(`id_post`, `visibility_post`, `title_post`, `introduction_post`, `creation_date_post`) VALUES (NULL,0,'Title','Introduction',NULL)"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
    $conn->query($sql);

    $_POST['redirected'] = true;
    header('Location: editor.php?redirected=1');
    exit();


    ?>