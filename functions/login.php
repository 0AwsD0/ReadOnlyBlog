<?php
    session_start();

    if(! isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] != $_POST['csrf_token']){
        exit('<h1> 405 Method Not Allowed </h1>');
    }

    //require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    require('../logs/log.php');

    $email = $_POST['email'];
    $passwd = $_POST['password'];
    require('dbconn.php');


try{

    $sql = 'SELECT `password_user`,`email_user` FROM `rob_user` WHERE `id_user` = 1';
    foreach ($conn->query($sql) as $row) {
        $obtained_email = $row['password_user'];
        $obtained_password = $row['email_user'];
    }

    if(password_verify($email, $obtained_password) && password_verify($passwd, $obtained_email))
    {
        add_into_log('login', 'Login SUCCESS');
        header('Location: ../admin_panel.php');
        session_start();
        $_SESSION['logged_in'] = true;
    }
    else{
        add_into_log('login', 'Login FAILED');
        header('Location: ../login_failed.php');
    }

    // 'test' = $2y$10$KiJx7nE86AW0z1lZdQzt3eR/W6RO5vj7ZbMHHIbdl5fJC0a86syJK
    // 'test@test.pl' = $2y$10$1xqNdt/FXFSUk1Snn6XL7.HsWimK26lVWWtdaQtSeD9sCtUwegBsC
    $conn = null;

}
catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    add_into_log('error', 'Login ERROR - '.$e->getMessage());
    $conn = null;
}

?>