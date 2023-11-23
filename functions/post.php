<?php
    $post_id =$_GET['post_id'];
    //echo('post id: '.$post_id);

    //
    //the below code can be replaced with better solution in the future -> possibly JSON to evade multiple records for one post in database
    //

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

    $amount_of_posts = 0;
    $sql ="SELECT id_post FROM rob_post";
    foreach ($conn->query($sql) as $row){
        $amount_of_posts++;
    }

    if($post_id < $amount_of_posts){
        echo('
        <form ethod="get" action="post.php">
            <input type="hidden" name="post_id" value="'.($post_id+1).'">
            <button id="next_post">Next Post</button>
        </form>
        ');
    }
    if($post_id != 1){
        echo('
        <form ethod="get" action="post.php">
            <input type="hidden" name="post_id" value="'.($post_id-1).'">
            <button id="previous_post">Previous Post</button>
        </form>
        ');
    }



}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $conn = null;
}

?>