<?php
    $post_id =$_GET['post_id'];
    //echo('post id: '.$post_id);

    //
    //the below code can be replaced with better solution in the future -> possibly JSON to evade multiple records for one post in database
    //
    //require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    require('logs/log.php');
try{
    //INNER JOIN and WHERE part 2 is present not only to show title but also to prevent direct access tohidden posts
    $sql = 'SELECT rob_post_content.content_post_content, rob_post_content.data_type_post_content, rob_post_content.id_post, rob_post_content.order_post_content, rob_post.visibility_post, rob_post.title_post FROM rob_post_content INNER JOIN `rob_post` ON rob_post.id_post = rob_post_content.id_post WHERE rob_post_content.id_post = '.$post_id.' AND rob_post.visibility_post = "1" ORDER BY rob_post_content.order_post_content ASC;';

    //$result = $conn->query($sql);


    foreach ($conn->query($sql) as $row){

        $title = 0;

        if($title == 0){
            echo('<div id="title">'.$row['title_post'].'</div>');
        }

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

        $title++;

    }

    //returns true if somone is trying to directly access unwisible post or the post do not contains anything.
    if( !array_key_exists('visibility_post', $row)){
        echo('<h1>404 - PAGE NOT FOUND... <i>or the post is empty</i></h1>');
        echo('<a href="index.php"><h3>Return to the main page</h3></a>');
    }

    $amount_of_posts = 0;
    $sql ="SELECT id_post FROM rob_post WHERE visibility_post = 1";
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
catch(Exception $e) {
    echo "Error: " . $e->getMessage();
    add_into_log('error', 'Post.php ERROR - '.$e->getMessage());
    $conn = null;
}

?>