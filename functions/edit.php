<?php
 session_start();

 if( ! isset($_SESSION['logged_in']) || ! isset($_SESSION['csrf_token'])){
     exit('<h1> 405 Method Not Allowed </h1>');
 }

 if(!($_SESSION['logged_in'] == true)){
     echo('<h1>You are not loged in!</h1><br>');
     exit('<h1>Log in first to access tis page!</h1>');
 }

    require('dbconn.php');
    require('../logs/log.php');

    if($_SESSION['csrf_token_editor'] != $_POST['csrf_token_editor'] || ! isset($_SESSION['csrf_token_editor']) || ! isset($_POST['csrf_token_editor'])){
       echo('<h1>CSRF TOKEN ERROR</h1><br>');
       add_into_log('error', 'CSRF ERROR - edit.php'.$e->getMessage());
       $conn = null;
       exit('<h1>CSRF TOKEN ERROR</h1>');
    }

    try{

        $id_post = $_POST['id'];
        $title_post = $_POST['title_post'];
        $introduction_post = $_POST['introduction_post'];

        $sql1 ="UPDATE `rob_post` SET `title_post` = '$title_post', `introduction_post` = '$introduction_post' WHERE id_post = $id_post";
        $query1 = $conn->prepare($sql1);
        $query1->execute();
        //add log - edit title and introd. success
            $i = 0;
            $i2 = 0;
        foreach ($_POST as $data){
            $i++;
            if($i>4){
                // 1 - ID POST CONTENT | 2 - ORDER POST CONTENT | 3 - TYPE CONTENT | 4 - CONTENT
                $i2++;
                if($i2 == 1){
                    $id_post_content = $data;
                }
                else if($i2 == 2){
                    $order_post_content = $data;
                }
                else if($i2 == 3){
                    $data_type_post_content = $data;
                }
                else if($i2 == 4){
                    $content_post_content = $data;
                    $i2 = 0;
                        $sql2 ="UPDATE `rob_post_content` SET `order_post_content` = '$order_post_content', `data_type_post_content` = '$data_type_post_content', `content_post_content` = '$content_post_content' WHERE `id_post_content` = $id_post_content ;";
                        $query2 = $conn->prepare($sql2);
                        $query2->execute();
                        //add log - modified entry on - ID postcontent - success - and maybe the sql? -> echo($sql2);
                }
                else{
                    add_into_log('error', '!!!CRITICAL ERROR!!! in -> Edit.php -> foreach loop <if> -> UNDEFINED BEHAVIOR! (else invoked)');
                    echo("CRITICAL ERROR - READ ERROR LOG");
                    exit(1);
                }


            }

        }


        $conn = null;
    }
    catch(Exception $e){
        echo(" !!!Changes NOT saved!!!");
        echo("<br>");
        echo("Error: " . $e->getMessage());
        add_into_log('error', '!!!CRITICAL ERROR!!! in -> Edit.php -> changes not saved! - '.$e->getMessage());
        $conn = null;
        exit(1);
    }

    //Return recived ID into GET or POST and send back to editor WITH success message -> ?edit=success
    header('Location: ../editor.php?id_post='.$id_post.'&edit=success');

?>