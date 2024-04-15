<div class="settings_holder" style="padding: 20px;">
  <form action="functions/settings_update.php" method="post">

    <h1>Settings Set</h1>

    <h4>Settings set ID: <?php echo($id_settings); ?></h4>

    <h4>Is settings set active?: <?php if($active_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_settings" class="active_settings" <?php if($active_settings == 1){echo('checked');} ?>>
    <label for="active_settings">Set this setting as active. (If more than one settings set is set this way, the last one in database will be chosen)</label>

    <h4>Active admin panell css prefix: <?php echo($admin_panel_css_settings); ?></h4>
    <input type="text" name="admin_panel_css_settings" value="<?php echo($admin_panel_css_settings); ?>">
    <label for="admin_panel_css_settings"> - change css for your admin panel</label>
    <h4>Active website css prefix: <?php echo($css_settings); ?></h4>
    <input type="text" name="css_settings" value="<?php echo($css_settings); ?>">
    <label for="css_settings"> - change css for your website</label>

    <h4>Name of the website: </h4><input type="text" name="blog_name_settings" class="blog_name_settings" value="<?php echo($blog_name_settings); ?>" >
    <label for="blog_name_settings"> - change name of the website</label>

    <h4>Header possition: <?php echo($header_text_color_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" class="center" name="header_position_settings" value="center" <?php if($header_position_settings == 'center'){echo('checked');} ?> />
          <label for="center">Center</label>
        </div>
        <div>
          <input type="radio" class="left" name="header_position_settings" value="left" <?php if($header_position_settings == 'left'){echo('checked');} ?> />
          <label for="left">Left</label>
        </div>
        <div>
          <input type="radio" class="right" name="header_position_settings" value="right" <?php if($header_position_settings == 'right'){echo('checked');} ?> />
          <label for="right">Right</label>
        </div>
      </fieldset>

    <h4>Header color: <?php echo($header_text_color_settings); ?></h4>
    <input type="text" name="header_text_color_settings" value="<?php echo($header_text_color_settings); ?>">
    <label for="admin_panel_css_settings"> - change website name collor by entering CSS name or HEX code</label>

    <h4>Header image settings: <?php echo($header_image_settings); ?></h4>
        <input type="text" name="header_image_uri_settings" class="header_image" value="<?php echo($header_image_uri_settings); ?>">
        <label for="header_image"> - link/path to header image</label>
      <fieldset>
        <div>
          <input type="radio" class="cover" name="header_image_settings" value="cover" <?php if($header_image_settings == 'cover'){echo('checked');} ?> />
          <label for="cover">Cover</label>
        </div>
        <div>
          <input type="radio" class="auto" name="header_image_settings" value="auto" <?php if($header_image_settings == 1){echo('checked');} ?> />
          <label for="auto">Auto</label>
        </div>
        <div>
          <input type="radio" class="contain" name="header_image_settings" value="contain" <?php if($header_image_settings == 'contain'){echo('checked');} ?> />
          <label for="contain">Contain</label>
        </div>
      </fieldset>

    <h4>Is aside element active?: <?php if($active_aside_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_aside_settings" class="aside_switch" <?php if($active_aside_settings = 1){echo('checked');} ?>>
    <label for="aside_switch">Enabling aside element in post pages while checked.</label>
    <br>

    <h4>Are links and icons on the footer active?: <?php if($active_footer_settings == 1){echo("Yes");}else{echo("No");}; ?></h4>
    <input type="checkbox" name="active_footer_settings" class="active_footer_settings" <?php if($active_footer_settings = 1){echo('checked');} ?>>
    <label for="active_footer_settings">Enable custom links with uploaed or linked icons on websites footer.</label>

    <input type="hidden" name="id_settings" value="<?php echo($id_settings); ?>">
    <input type="hidden" name="csrf_token_settings" value="<?php echo($csrf_token_settings); ?>">
      <br>
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Save Settings Set</button>
  </form>
    <?php
    //prevents deletion of first settings set so there is at least one
    if($id_settings != 1){
        echo('
        <form action="functions/settings_delete.php" method="post">
            <br>
            <input type="hidden" name="id_settings" value="'.$id_settings.'">
            <input type="hidden" name="csrf_token_settings" value="'.$csrf_token_settings.'">
            <button type="submit" class="btn btn-danger">Delete Settings Set ID '.$id_settings.'</button>
        </form>
      ');
    }
    ?>
</div>