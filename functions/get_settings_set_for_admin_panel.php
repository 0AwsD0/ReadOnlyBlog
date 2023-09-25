
<div class="settings_holder" style="padding: 20px;">
  <form action="functions/settings_update.php" method="post">

    <h1>Settings Set</h1>

    <h4>Settings set ID: <?php echo($id_setings); ?></h4>

    <h4>Is settings set active?: <?php if($active_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_settings" class="active_settings" <?php if($active_settings == 1){echo('checked');} ?>>
    <label for="active_settings">Set this setting as active. (If more than one settings set is set this way, the first one in database will be chosen.)</label>

    <h4>Name of the website: </h4><input type="text" name="blog_name_settings" class="blog_name_settings" value="<?php echo($blog_name_settings); ?>" >
    <label for="blog_name_settings"> - Change name of the website</label>

    <h4>Header possition: <?php echo($header_position_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" class="center" name="header_possition" value="center" <?php if($header_position_settings == 'center'){echo('checked');} ?> />
          <label for="center">Center</label>
        </div>
        <div>
          <input type="radio" class="left" name="header_possition" value="left" <?php if($header_position_settings == 'left'){echo('checked');} ?> />
          <label for="left">Left</label>
        </div>
        <div>
          <input type="radio" class="right" name="header_possition" value="right" <?php if($header_position_settings == 'right'){echo('checked');} ?> />
          <label for="right">Right</label>
        </div>
      </fieldset>

    <h4>Header image settings: <?php echo($header_image_settings); ?></h4>
        <input type="text" name="header_image" class="header_image" value="<?php echo($header_image_uri_settings); ?>">
        <label for="header_image"> - link/path to header image</label>
      <fieldset>
        <div>
          <input type="radio" class="cover" name="header_image_possition" value="cover" <?php if($header_image_settings == 'cover'){echo('checked');} ?> />
          <label for="cover">Cover</label>
        </div>
        <div>
          <input type="radio" class="auto" name="header_image_possition" value="auto" <?php if($header_image_settings == 1){echo('checked');} ?> />
          <label for="auto">Auto</label>
        </div>
        <div>
          <input type="radio" class="contain" name="header_image_possition" value="contain" <?php if($header_image_settings == 'contain'){echo('checked');} ?> />
          <label for="contain">Contain</label>
        </div>
      </fieldset>

    <h4>Is aside element active?: <?php if($active_aside_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="aside_switch" class="aside_switch" <?php if($active_aside_settings = 1){echo('checked');} ?>>
    <label for="aside_switch">Enabling aside element in post pages while checked.</label>
    <br>

    <h4>Are links and icons on the footer active?: <?php if($active_footer_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_footer_settings" class="active_footer_settings" <?php if($active_footer_settings = 1){echo('checked');} ?>>
    <label for="active_footer_settings">Enable custom links with uploaed or linked icons on websites footer.</label>

    <input type="hidden" name="settings_set" value="<?php echo($id_setings); ?>">
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Save Settings Set</button>
  </form>



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
                <input type="submit" value="SAVE CHANGES" class="btn btn-primary" style="color: white;">
            </form>
          <br>
            <form action="functions/delete_link.php" method="post">
              <input type="hidden" name="id_footer" value="'.$id_footer.'">
              <input type="submit" value="DELETE THIS LINK" class="btn btn-warning" style="color: white;">
            </form>
          <br>
          <br>
        ');
      }
}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
$conn = null;
}
?>
    <!-- add_link.php below -->
      <!-- Add in PHP check if the settigns id is 1 than can not delete only one settings set. -->
    <?php
    if($id_setings != 1){
        echo('
        <form action="functions/settings_delete.php" method="post">
            <br>
            <input type="hidden" name="settings_id_'.$id_setings.'" value="'.$id_setings.'">
            <button type="submit" class="btn btn-danger">Delete Settings Set ID '.$id_setings.'</button>
        </form>
      ');
    }
    ?>
  <h5>TO ADD - CUSTOM CSS FOR SETTINGS SET - for example you can set diferent styles seasons - winter summer</h5>
</div>