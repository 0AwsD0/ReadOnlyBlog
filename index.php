<?php
    require ('functions/dbconn.php');
    require ('functions/get_settings_for_index.php');
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
    <link rel="stylesheet" href=<?php echo("css/".$css_settings."index.css"); ?>>
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
        <div class="container">
            <div class="row no-gutters index-content justify-content-md-center">
            <?php
                require('functions/show_posts.php');
            ?>
            </div>
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