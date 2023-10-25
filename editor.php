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
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="admin_panel.php">Admin panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit_post.php">Back to edit list</a><!-- Creates post taht is not visible and redirects to Editor (same as edit post redirects after selecting post to edit) post with ID of new post. -->
                        </li>
                    </ul>
                    <a class="nav-link" href="functions/logout.php"><button class="btn btn-danger log_out">Logout</button></a>
                </nav>
        <main class="main">
            <p id="p_help">For tutorial on how to edit and modify your posts click <a href="#"><button class="btn btn-primary">HERE </button></a></p>/\/\/\add link to DOC later
            <div class="row justify-content-center" style="margin: 0 !important; display: block !important;">
                <div class="col-12">
                <form id="main-form" class="form_edit" action="functions/edit.php" method="post">
                    <?php

                        $id_post =$_GET['id_post'];

                        try{
                            $sql = 'SELECT visibility_post, order_post_content, data_type_post_content, content_post_content FROM rob_post_content INNER JOIN rob_post ON rob_post_content.id_post = rob_post.id_post WHERE rob_post_content.id_post = '.$id_post.' '; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
                            foreach ($conn->query($sql) as $row){

                                $visibility_post = $row['visibility_post'];
                                $order_post_content = $row['order_post_content'];
                                $data_type_post_content = $row['data_type_post_content'];
                                switch($row['data_type_post_content']){
                                    case 0:
                                            echo('
                                            <div class="edit_wrap">
                                                <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                                <label for="data_type_post_content">Data Type:</label>
                                                <select id="data_type_list" name="data_type_post_content" form="main-form">
                                                  <option value="0">Paragraph</option>
                                                  <option value="1">H1</option>
                                                  <option value="2">H2</option>
                                                  <option value="3">H3</option>
                                                  <option value="4">H4</option>
                                                  <option value="5">H5</option>
                                                  <option value="6">H6</option>
                                                  <option value="7">Link</option>
                                                  <option value="8">Image</option>
                                                </select>
                                                 <p><br><input class="resizable-input" type="text" name="content_post_content" style="width: 100%;" value="'.$row['content_post_content'].'" form="main-form"></p>
                                                 <p>Do you want to delete this block?</p>
                                                <input type="checkbox" name="delete_block" form="delete-form">
                                                <input type="hidden" name="delete_block" form="delete-form">
                                            </div>
                                            ');
                                            //dla delete blockfunkcja w functions
                                        break;
                                    case 1:
                                            echo('
                                            <div class="edit_wrap">
                                                <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                                <label for="data_type_post_content">Data Type:</label>
                                                <select id="data_type_list" name="data_type_post_content" form="main-form">
                                                <option value="1">H1</option>
                                                <option value="0">Paragraph</option>
                                                <option value="2">H2</option>
                                                <option value="3">H3</option>
                                                <option value="4">H4</option>
                                                <option value="5">H5</option>
                                                <option value="6">H6</option>
                                                <option value="7">Link</option>
                                                <option value="8">Image</option>
                                                </select>
                                             <h1><br><input class="resizable-input" type="text" name="content_post_content" style="width: 100%;" value="'.$row['content_post_content'].'" form="main-form"></h1>
                                             </div>
                                            ');
                                        break;
                                    case 2:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="2">H2</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="3">H3</option>
                                              <option value="4">H4</option>
                                              <option value="5">H5</option>
                                              <option value="6">H6</option>
                                              <option value="7">Link</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <h2>'.$row['content_post_content'].'</h2>
                                            ');
                                        break;
                                    case 3:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="3">H3</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="4">H4</option>
                                              <option value="5">H5</option>
                                              <option value="6">H6</option>
                                              <option value="7">Link</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <h3>'.$row['content_post_content'].'</h3>
                                            ');
                                        break;
                                    case 4:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="4">H4</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="3">H3</option>
                                              <option value="5">H5</option>
                                              <option value="6">H6</option>
                                              <option value="7">Link</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <h4>'.$row['content_post_content'].'</h4>
                                            ');
                                        break;
                                    case 5:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="5">H5</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="3">H3</option>
                                              <option value="4">H4</option>
                                              <option value="6">H6</option>
                                              <option value="7">Link</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <h5>'.$row['content_post_content'].'</h5>
                                            ');
                                        break;
                                    case 6:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="6">H6</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="3">H3</option>
                                              <option value="4">H4</option>
                                              <option value="5">H5</option>
                                              <option value="7">Link</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <h6>'.$row['content_post_content'].'</h6>
                                            ');
                                        break;
                                    case 7:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                              <option value="7">Link</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="3">H3</option>
                                              <option value="4">H4</option>
                                              <option value="5">H5</option>
                                              <option value="6">H6</option>
                                              <option value="8">Image</option>
                                            </select>
                                                <a href="'.$row['content_post_content'].'">'.$row['content_post_content'].'</a>
                                            ');
                                        break;
                                    case 8:
                                            echo('
                                            <p style="margin: 10px; margin-left: 0;">Order: <input type="number" name="order_post_content" style="width:" value="'.$row['order_post_content'].'"></p>
                                            <label for="data_type_post_content">Data Type:</label>
                                            <select id="data_type_list" name="data_type_post_content">
                                            <option value="8">Image</option>
                                              <option value="0">Paragraph</option>
                                              <option value="1">H1</option>
                                              <option value="2">H2</option>
                                              <option value="3">H3</option>
                                              <option value="4">H4</option>
                                              <option value="5">H5</option>
                                              <option value="6">H6</option>
                                              <option value="7">Link</option>
                                            </select>
                                                <img class="post_image" src="'.$row['content_post_content'].'">
                                            ');
                                        break;
                                }

                                echo('ROW: ');
                                echo($visibility_post);
                                echo('<-visibility; ');
                                echo($order_post_content);
                                echo($data_type_post_content);

                                echo('<br>');
                            }
                        }
                        catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        $conn = null;
                        }

                    ?>
                        <input type="submit" value="Save" class="btn btn-primary" style="margin: 20px;">
                     </form>

                    <form action="edit_add_block.php" method="post">
                        <label for="add_block_type">Type of block you wanna add:</label>
                        <select id="add_block_type" name="add_block_type">
                            <option value="0">Paragraph</option>
                            <option value="1">H1</option>
                            <option value="2">H2</option>
                            <option value="3">H3</option>
                            <option value="4">H4</option>
                            <option value="5">H5</option>
                            <option value="6">H6</option>
                            <option value="7">Link</option>
                            <option value="8">Image</option>
                        </select>
                        <input type="submit" value="Add Block" class="btn btn-primary" style="margin: 20px;">
                    </form>

                    <form action="edit_delete_block.php" method="post">
                        <label for="number">ID if the block you want to delete.</input>
                        <input type="number" name="number_to_delete" id="XDddddd">
                        <input type="submit" value="Delete Block" class="btn btn-danger" style="margin: 20px;">
                    </form>

                </div>
            </div>
        </main>
    </div>

</body>
</html>
<?php
$conn = null;
?>