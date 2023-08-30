<?php
    require('dbconn.php');

    $post_id =$_GET['post_id'];
    echo('post id: '.$post_id);

    $sql = 'SELECT rob_post_content.content_post_content, rob_post_content.data_type_post_content, rob_post.id_post, rob_post_content.order_post_content FROM rob_post,rob_post_content WHERE rob_post.id_post = '.$post_id.' ORDER BY rob_post_content.order_post_content ASC';

    $result = $conn->query($sql);

    foreach ($conn->query($sql) as $row){
        switch($row['data_type_post_content']){
            case 1:
                    echo('<p>'.$row['content_post_content'].'</p>');
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                break;
        }
    }






    //type 0 - text //type 1 - H1 // type 2 - h2 // type 3 - h3 // type 4 - h4 //type 5 - h5 //type 6 - h6 //type 7 - link //type 8 - image = SWITCH CASE




?>