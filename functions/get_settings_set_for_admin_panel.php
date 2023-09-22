
<div id="settings_holder" style="padding: 20px;">
  <form action="functions/settings_update.php" method="post">

    <h1>Settings Set</h1>

    <h4>Settings set ID: <?php echo($id_setings); ?></h4>

    <h4>Is settings set active?: <?php if($active_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_settings_<?php echo($id_setings); ?>" id="active_settings_<?php echo($id_setings);?>" <?php if($active_settings == 1){echo('checked');} ?>>
    <label for="active_settings_<?php echo($id_setings); ?>">Set this setting as active. (If more than one settings set is set this way, the first one in database will be chosen.)</label>

    <h4>Name of the website: </h4><input type="text" name="blog_name_settings_<?php echo($id_setings); ?>" id="blog_name_settings_<?php echo($id_setings); ?>" value="<?php echo($blog_name_settings); ?>" >
    <label for="blog_name_settings_<?php echo($id_setings); ?>"> - Change name of the website</label>


    <h4>Header possition: <?php echo($header_position_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="center_<?php echo($id_setings);?>" name="header_possition_<?php echo($id_setings); ?>" value="center" <?php if($header_position_settings == 'center'){echo('checked');} ?> />
          <label for="center_<?php echo($id_setings); ?>">Center</label>
        </div>
        <div>
          <input type="radio" id="left_<?php echo($id_setings); ?>" name="header_possition_<?php echo($id_setings); ?>" value="left" <?php if($header_position_settings == 'left'){echo('checked');} ?> />
          <label for="left_<?php echo($id_setings); ?>">Left</label>
        </div>
        <div>
          <input type="radio" id="right_<?php echo($id_setings); ?>" name="header_possition_<?php echo($id_setings); ?>" value="right" <?php if($header_position_settings == 'right'){echo('checked');} ?> />
          <label for="right_<?php echo($id_setings); ?>">Right</label>
        </div>
      </fieldset>

    <h4>Header image settings: <?php echo($header_image_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="cover_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="cover" <?php if($header_image_settings == 'cover'){echo('checked');} ?> />
          <label for="cover_<?php echo($id_setings); ?>">Cover</label>
        </div>
        <div>
          <input type="radio" id="auto_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="auto" <?php if($header_image_settings == 1){echo('checked');} ?> />
          <label for="auto_<?php echo($id_setings); ?>">Auto</label>
        </div>
        <div>
          <input type="radio" id="contain_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="contain" <?php if($header_image_settings == 'contain'){echo('checked');} ?> />
          <label for="contain_<?php echo($id_setings); ?>">Contain</label>
        </div>
      </fieldset>

    <h4>Is aside element active?: <?php if($active_aside_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="aside_switch_<?php echo($id_setings); ?>" id="aside_switch_<?php echo($id_setings); ?>" <?php if($active_aside_settings = 1){echo('checked');} ?>>
    <label for="aside_switch_<?php echo($id_setings); ?>">Enabling aside element in post pages while checked.</label>
    <br>

    <h4>Are links and icons on the footer active?: <?php if($active_footer_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_footer_settings_<?php echo($id_setings); ?>" id="active_footer_settings_<?php echo($id_setings); ?>" <?php if($active_footer_settings = 1){echo('checked');} ?>>
    <label for="active_footer_settings_<?php echo($id_setings); ?>">Enable custom links with uploaed or linked icons on websites footer.</label>


    <input type="hidden" name="settings_set_<?php echo($id_setings); ?>" value="<?php echo($id_setings); ?>">
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Save Settings Set</button>
  </form>



    <br>
    <br>
    <h5>Whitch websites should be enabled?</h5>
    <h6>You can paste link or directory path in your server to set custom images for your links.</h6>

<?php
 try{
  $sql = "SELECT * FROM rob_footer WHERE id_settings = 1"; //+add in database new table containnig links icons etc. or ad columns to settings table and get them as varibles here to be used inside get_settings_set_for_admin_panel.php
  foreach ($conn->query($sql) as $row){
        $id_footer = $row['id_footer'];
        $name_footer = $row['name_footer'];
        $link_footer = $row['link_footer'];
        $image_footer = $row['image_footer'];
        echo('
            <form action="functions/edit_link.php" method="post">
                <input type="text" name="name" id="name" value="'.$name_footer.'">
                <label for="github_"> - name of your link</label>
              <br>
                <input type="text" name="github_link_" id="github_link_" value="'.$link_footer.'">
                <label for="github_link_"> - link url</label>
              <br>
                <input type="text" name="github_icon_link_" id="github_link_" value="'.$image_footer.'">
                <label for="github_icon_link_"> - link/path to icon</label>
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