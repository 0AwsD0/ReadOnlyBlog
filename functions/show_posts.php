<?php
require('dbconn.php');
try{
    $sql = "SELECT id_post,title_post,introduction_post,creation_date_post FROM rob_post WHERE visibility_post = 1";
    foreach ($conn->query($sql) as $row){
            echo(
                '<div class="col-md-auto">
                <div class="post">
                <h4>'
                . $row['title_post'].
                '</h4>
                <p>'
                . $row['introduction_post'].
                    '</p><p>'
                    .$row['creation_date_post'].
                    '</p>
                        <form ethod="get" action="post">
                            <input type="hidden" name="post_id" value="'.$row['id_post'].'">
                            <button class="btn-index" type="submit">Read</button>
                        </form>
                    </div>
                    </div>'
                );
        }
        $conn = null;
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  $conn = null;
}
?>