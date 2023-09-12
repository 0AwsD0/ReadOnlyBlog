<?php
    require('dbconn.php');

    $post_id =$_GET['post_id'];
    //echo('post id: '.$post_id);

try{
    $sql = 'SELECT rob_post_content.content_post_content, rob_post_content.data_type_post_content, rob_post_content.id_post, rob_post_content.order_post_content FROM rob_post_content WHERE rob_post_content.id_post = '.$post_id.' ORDER BY rob_post_content.order_post_content ASC';

    //$result = $conn->query($sql);

    foreach ($conn->query($sql) as $row){
        switch($row['data_type_post_content']){
            case 0:
                    echo('<p>'.$row['content_post_content'].'</p>');
                break;
            case 1:
                    echo('<h1>'.$row['content_post_content'].'</h1>');
                break;
            case 2:
                    echo('<h2>'.$row['content_post_content'].'</h2>');
                break;
            case 3:
                    echo('<h3>'.$row['content_post_content'].'</h3>');
                break;
            case 4:
                    echo('<h4>'.$row['content_post_content'].'</h4>');
                break;
            case 5:
                    echo('<h5>'.$row['content_post_content'].'</h5>');
                break;
            case 6:
                    echo('<h6>'.$row['content_post_content'].'</h6>');
                break;
            case 7:
                    echo('<a href="'.$row['content_post_content'].'">'.$row['content_post_content'].'</a>');
                break;
            case 8:
                    echo('<img class="post_image" src="'.$row['content_post_content'].'">');
                break;
        }
    }
    $conn = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $conn = null;
}







    //type 0 - text //type 1 - H1 // type 2 - h2 // type 3 - h3 // type 4 - h4 //type 5 - h5 //type 6 - h6 //type 7 - link //type 8 - image = SWITCH CASE




?>