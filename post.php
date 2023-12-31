<?php
    require('functions/dbconn.php');
    require('functions/get_settings_for_post.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            echo($blog_name_settings);
        ?>
    </title>
    <link rel="stylesheet" href=<?php echo("css/".$css_settings."main.css"); ?>>
    <link rel="stylesheet" href=<?php echo("css/".$css_settings."post.css"); ?>>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <header>
            <?php
                require('elements/header.php');
            ?>
        </header>
        <div class="row content justify-content-md-center">
            <div class="col-xxl-6 content-text">
                <?php require('functions/post.php') ?>
            </div>
            <?php
                if($active_aside_settings == 1){
                    require('elements/aside.php');
                }
            ?>
        </div>
        <footer>
            <?php
                require('elements/footer.php');
                $conn = null;
            ?>
        </footer>
    </div>
</body>
</html>