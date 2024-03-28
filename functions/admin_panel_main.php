<?php
//require($_SERVER['DOCUMENT_ROOT'].'/logs/log.php');
require('logs/log.php');
    try{
        $sql = "SELECT * FROM rob_settings"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
        foreach ($conn->query($sql) as $row){
              $id_settings = $row['id_settings'];
              $header_text_color_settings = $row['header_text_color_settings'];
              $css_settings = $row['css_settings'];
              $header_position_settings = $row['header_position_settings'];
              $header_image_uri_settings = $row['header_image_uri_settings'];
              $header_image_settings = $row['header_image_settings'];
              $active_settings = $row['active_settings'];
              $blog_name_settings = $row['blog_name_settings'];
              $active_footer_settings = $row['active_footer_settings'];
              $active_aside_settings = $row['active_aside_settings'];
              require('get_settings_set_for_admin_panel.php');
            }
    }
  catch(Exception $e) {
      echo "Error: " . $e->getMessage();
      add_into_log('error', 'Admin panel main ERROR - '.$e->getMessage());
      $conn = null;
  }
?>

<!-- OPEN -->
<div class="settings_holder" id="goto_footer_links" style="padding: 20px;">
<br>
    <br>
    <h5>Whitch websites links should be enabled?</h5>
    <h6>You can paste link or directory path in your server to set custom images for your links.</h6>
    <h6>This settings are global - no matter witch settings set you use links stay the same.<br> You can disable or enable link by using designated checkbox.</h6>
    <br>
<?php
 try{
  $sql = "SELECT * FROM rob_footer"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
  foreach ($conn->query($sql) as $row){
        $id_footer = $row['id_footer'];
        $name_footer = $row['name_footer'];
        $link_footer = $row['link_footer'];
        $image_footer = $row['image_footer'];
        $is_enabled_footer =$row['is_enabled_footer'];

                  if($is_enabled_footer == 1){
                      $checked ='checked';
                      $checkbox_link_state = ' (YES)';
                  }
                  else{
                      $checked ='';
                      $checkbox_link_state = ' (NO)';
                  }

        echo('
            <form action="functions/edit_link.php" method="post">
                <input type="text" name="name_footer" class="name" value="'.$name_footer.'">
                <label for="name_footer"> - name of your link</label>
              <br>
                <input type="text" name="link_footer" class="link_footer" value="'.$link_footer.'">
                <label for="link_foote"> - link url</label>
              <br>
                <input type="text" name="image_footer" class="image_footer" value="'.$image_footer.'">
                <label for="image_footer"> - link/path to icon</label>
              <br>
                <input type="checkbox" name="is_enabled_footer" value="'.$is_enabled_footer.'"'.$checked.'>
                <label for="is_enabled_footer"> - Is it enabled? '.$checkbox_link_state.'</label>
              <br>
              <br>
                <input type="hidden" name="id_footer" value="'.$id_footer.'">
                <input type="hidden" name="csrf_token_settings" value="'.$csrf_token_settings.'">
                <input type="submit" value="SAVE CHANGES" class="btn btn-primary" style="color: white;">
            </form>
          <br>
            <form action="functions/delete_link.php" method="post">
              <input type="hidden" name="id_footer" value="'.$id_footer.'">
              <input type="hidden" name="csrf_token_settings" value="'.$csrf_token_settings.'">
              <input type="submit" value="DELETE THIS LINK" class="btn btn-warning" style="color: white;">
            </form>
          <br>
          <br>
        ');
      }
    echo('
      <form action="functions/add_link.php" method="post">
        <input type="submit" value="ADD NEW LINK" class="btn btn-primary" style="color: white;">
        <input type="hidden" name="csrf_token_settings" value="'.$csrf_token_settings.'">
      </form>
    ');
}
catch(Exception $e) {
echo "Error: " . $e->getMessage();
add_into_log('error', 'Get settings set ERROR - '.$e->getMessage());
$conn = null;
}

$conn = null;

?>
<!-- CLOSE -->
</div>