<?php
require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
    try{
            $sql = "SELECT id_post,title_post FROM rob_post"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
            foreach ($conn->query($sql) as $row){
                $id_post = $row['id_post'];
                $title_post = $row['title_post'];
                echo('
                    <div class="list_holder">
                        <div class="list">ID:'.$id_post.'</div><div class="list_title">TITLE: '.$title_post.'&nbsp;&nbsp;<form action="editor.php" method="GET"><input type="hidden" name="id_post" value="'.$id_post.'"><button class="btn btn-primary list_btn">Edit</button></form></div>
                    </div>
                ');
            }
        }
        catch(Exception $e) {
        echo "Error: " . $e->getMessage();
        add_into_log('error', 'List posts ERROR - '.$e->getMessage());
        $conn = null;
        }
?>
