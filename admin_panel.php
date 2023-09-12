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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROB Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 header"><h1>Welcome in Admin Panel!</h1></div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Edit Posts</a>
                        </li>
                    </ul>
                </nav>
                <a class="nav-link" href="functions/logout.php"><button class="btn btn-primary log_out">Logout</button></a>

                <main>
                    <?php require('functions/admin_panel_main.php'); ?>
                </main>

            </div>
        </div>
    </div>

<footer>

</footer>

</body>
</html>
