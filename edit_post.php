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
        $sql = "SELECT admin_panel_css_settings FROM rob_settings WHERE active_settings = 1"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
        foreach ($conn->query($sql) as $row){
            $admin_panel_css_settings = $row['admin_panel_css_settings'];
        }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      $conn = null;
    }

    $csrf_token_edit_post = bin2hex(random_bytes(20));
    $_SESSION['csrf_token_edit_post'] = $csrf_token_edit_post;

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
                <div class="col-12 header"><h1>Edit Post</h1></div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="admin_panel.php">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_post.php">Add Post</a><!-- Creates post taht is not visible and redirects to Editor (same as edit post redirects after selecting post to edit) post with ID of new post. -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Edit Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages.php">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="documentation.php">Documentation</a>
                        </li>
                    </ul>
                    <a class="nav-link" href="functions/logout.php"><button class="btn btn-danger log_out">Logout</button></a>
                </nav>

                <main class="main">
                    <?php require('functions/list_posts.php'); ?>
                    <!-- Content Here -->
                    <!-- List of posts and button edit - rows like in database slick and horizontal lines - post ID post Title and Edit button as row (80% screen?) --->
                </main>

            </div>
        </div>
    </div>

</body>
</html>
<?php
$conn = null;
?>