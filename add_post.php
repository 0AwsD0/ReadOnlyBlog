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

    require('functions/dbconn.php');
    try{
        $sql = "SELECT admin_panel_css_settings FROM rob_settings WHERE active_settings = 1"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
        foreach ($conn->query($sql) as $row){
            $admin_panel_css_settings = $row['admin_panel_css_settings'];
        }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      $conn = null;
    }
//SQL adding newpost - disabled visibility + redirect to deitor woth new post ID
?>