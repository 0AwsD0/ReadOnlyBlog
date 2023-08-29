<?php
require('dbconn.php');
try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT title_post,introduction_post,creation_date_post FROM rob_post WHERE visibility_post = 1");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
            echo(
                '<div class="col-md-auto post">
                <h4>'
                . $v['title_post'].
                '</h4>
                <p>'
                . $v['introduction_post'].
                    '</p><p>'
                    .$v['creation_date_post'].
                    '</p><button class="btn-index">Read</button>
                    </div>'
                );
        }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>