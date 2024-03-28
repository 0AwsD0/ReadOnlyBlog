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
    try{
        $sql = "SELECT admin_panel_css_settings FROM rob_settings WHERE active_settings = 1";
        foreach ($conn->query($sql) as $row){
            $admin_panel_css_settings = $row['admin_panel_css_settings'];
        }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      $conn = null;
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
    <link rel="stylesheet" href=<?php echo("css/".$admin_panel_css_settings."admin_panel.css"); ?>>
</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 header"><h1>Documentation</h1></div>
            </div>
        </div>
    </header>

    <div class="container">
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="admin_panel.php">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_post.php">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit_post.php">Edit Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages.php">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="documentation.php">Documentation</a>
                        </li>
                    </ul>
                    <a class="nav-link" href="functions/logout.php"><button class="btn btn-danger log_out">Logout</button></a>
                </nav>
        <main class="main">

            <div class="row justify-content-center" style="margin: 0 !important; display: block !important;">
            <h4>The login and password storing system.</h4>
                <p>After installing the Read Only Blog you can change your password in </p>
            </div>

            <div class="row justify-content-center" style="margin: 0 !important; display: block !important; border-top: 1px solid #dee2e6;">
            <h4>Editor</h4>
                <p>ID: - shows post ID in database</p>
            </div>

        </main>
    </div>

</body>
</html>
<?php
$conn = null;
?>