<?php
    session_start();
    $csrf_token = bin2hex(random_bytes(20));
    $_SESSION['csrf_token'] = $csrf_token;

    if(isset($_SESSION['logged_in']) && isset($_SESSION['csrf_token'])){
        header('Location: admin_panel.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadOnlyBlog Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-auto login">
                <h1>Welcome!</h1>
                <h2>Enter administrator credentials below.</h2>
                <form action="functions/login.php" method="post">
                    <label for="email">Enter admin email:</label><br>
                    <input type="email" name="email" id="email"><br>
                    <label for="password">Enter admin password:</label><br>
                    <input type="password" name="password" id="password"><br>
                    <input type="hidden" name="csrf_token" value="<?php echo($csrf_token); ?>">
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>