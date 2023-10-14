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
                <div class="col-12 header"><h1>Editor</h1></div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <main class="main">
                    <button>ADMIN PANEL</button>
                    <button>BACK TO POST LIST</button>
                    <!-- Content Here -->
                    <!-- 2 buttons at the top BACK(to the post list) and ADMIN PANEL -->
                </main>

            </div>
        </div>
    </div>

</body>
</html>
<?php
$conn = null;
?>