
<div id="settings_holder" style="padding: 20px;">
  <form action="functions/settings_update.php" method="post">

    <h1>Settings Set</h1>

    <h4>Settings set: <?php echo($id_setings); ?></h4>

    <h4>Header possition: <?php echo($header_position_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="middle_<?php echo($id_setings);?>" name="header_possition_<?php echo($id_setings); ?>" value="middle" checked />
          <label for="middle_<?php echo($id_setings); ?>">Middle</label>
        </div>
        <div>
          <input type="radio" id="left_<?php echo($id_setings); ?>" name="header_possition_<?php echo($id_setings); ?>" value="left" />
          <label for="left_<?php echo($id_setings); ?>">Left</label>
        </div>
        <div>
          <input type="radio" id="right_<?php echo($id_setings); ?>" name="header_possition_<?php echo($id_setings); ?>" value="right" />
          <label for="right_<?php echo($id_setings); ?>">Right</label>
        </div>
      </fieldset>

    <h4>Header image settings: <?php echo($header_image_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="fill_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="fill" checked />
          <label for="fill_<?php echo($id_setings); ?>">Fill</label>
        </div>
        <div>
          <input type="radio" id="center_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="center" />
          <label for="center_<?php echo($id_setings); ?>">Center</label>
        </div>
        <div>
          <input type="radio" id="repeat_<?php echo($id_setings); ?>" name="header_image_possition_<?php echo($id_setings); ?>" value="repeat" />
          <label for="repeat_<?php echo($id_setings); ?>">Repeat</label>
        </div>
      </fieldset>

    <h4>Is settings set active?: <?php echo($active_settings); ?></h4>
    <input type="checkbox" name="set_settings_active_<?php echo($id_setings); ?>" id="set_settings_active_<?php echo($id_setings); ?>">
    <label for="set_settings_active_<?php echo($id_setings); ?>">Set this setting as active. (If more than one settings set is set this way, the first one in database will be chosen.)</label>


    <h4>Header name of the website: </h4><input type="text" name="website_name_<?php echo($id_setings); ?>" id="website_name_<?php echo($id_setings); ?>" value="<?php echo($blog_name_settings); ?>" >
    <label for="website_name_<?php echo($id_setings); ?>"> - Change name of the website</label>

    <h4>Are links and icons on the footer active?: <?php echo($active_footer_settings); ?></h4>
    <input type="checkbox" name="foter_<?php echo($id_setings); ?>" id="foter_<?php echo($id_setings); ?>">
    <label for="foter_<?php echo($id_setings); ?>">Enable links with icons on websites footer - Github, Youtube etc.</label>
    <br>
    <br>
    <h5>Whitch websites should be enabled?</h5>
    <h6>You can paste link or directory path in your server to set custom images for your links.</h6>

    <input type="checkbox" name="github_<?php echo($id_setings); ?>" id="github_<?php echo($id_setings); ?>">
    <label for="github_<?php echo($id_setings); ?>">Github</label>
    <br>
    <input type="text" name="github_link_<?php echo($id_setings); ?>" id="github_link_<?php echo($id_setings); ?>">
    <label for="github_link_<?php echo($id_setings); ?>"> - link to your Github</label>
    <br>
    <br>
    <input type="text" name="github_icon_link_<?php echo($id_setings); ?>" id="github_link_<?php echo($id_setings); ?>">
    <label for="github_icon_link_<?php echo($id_setings); ?>"> - link to your Github icon</label>
    <br>
    <br>

    <input type="checkbox" name="bitbucket_<?php echo($id_setings); ?>" id="bitbucket_<?php echo($id_setings); ?>">
    <label for="bitbucket_<?php echo($id_setings); ?>">Bitbucket</label>
    <br>
    <input type="text" name="bitbucket_link_<?php echo($id_setings); ?>" id="bitbucket_link_<?php echo($id_setings); ?>">
    <label for="bitbucket_link_<?php echo($id_setings); ?>"> - link to your Bitbucket</label>
    <br>
    <br>
    <input type="text" name="bitbucket_icon_link_<?php echo($id_setings); ?>" id="bitbucket_link_<?php echo($id_setings); ?>">
    <label for="bitbucket_icon_link_<?php echo($id_setings); ?>"> - link to your Bitbucket icon</label>
    <br>
    <br>

    <input type="checkbox" name="sourceforge_<?php echo($id_setings); ?>" id="sourceforge_<?php echo($id_setings); ?>">
    <label for="sourceforge_<?php echo($id_setings); ?>">SourceForge</label>
    <br>
    <input type="text" name="sourceforge_link_<?php echo($id_setings); ?>" id="sourceforge_link_<?php echo($id_setings); ?>">
    <label for="sourceforge_link_<?php echo($id_setings); ?>"> - link to your SourceForge</label>
    <br>
    <br>
    <input type="text" name="sourceforge_icon_link_<?php echo($id_setings); ?>" id="sourceforge_link_<?php echo($id_setings); ?>">
    <label for="sourceforge_icon_link_<?php echo($id_setings); ?>"> - link to your SourceForge icon</label>
    <br>
    <br>

    <input type="checkbox" name="linkedin_<?php echo($id_setings); ?>" id="linkedin_<?php echo($id_setings); ?>">
    <label for="linkedin_<?php echo($id_setings); ?>">LinkedIn</label>
    <br>
    <input type="text" name="linkedin_link_<?php echo($id_setings); ?>" id="linkedin_link_<?php echo($id_setings); ?>">
    <label for="linkedin_link_<?php echo($id_setings); ?>"> - link to your LinkedIn</label>
    <br>
    <br>
    <input type="text" name="linkedin_icon_link_<?php echo($id_setings); ?>" id="linkedin_link_<?php echo($id_setings); ?>">
    <label for="linkedin_icon_link_<?php echo($id_setings); ?>"> - link to your LinkedIn icon</label>
    <br>
    <br>

    <input type="checkbox" name="yt_<?php echo($id_setings); ?>" id="yt_<?php echo($id_setings); ?>">
    <label for="yt_<?php echo($id_setings); ?>">YouTube</label>
    <br>
    <input type="text" name="yt_link_<?php echo($id_setings); ?>" id="yt_link_<?php echo($id_setings); ?>">
    <label for="yt_link_<?php echo($id_setings); ?>"> - link to your YouTube</label>
    <br>
    <br>
    <input type="text" name="yt_icon_link_<?php echo($id_setings); ?>" id="yt_link_<?php echo($id_setings); ?>">
    <label for="yt_icon_link_<?php echo($id_setings); ?>"> - link to your YouTube icon</label>
    <br>
    <br>

    <input type="checkbox" name="custom1_<?php echo($id_setings); ?>" id="custom1_<?php echo($id_setings); ?>">
    <label for="custom1_<?php echo($id_setings); ?>">Custom link 1</label>
    <br>
    <input type="text" name="custom1_link_<?php echo($id_setings); ?>" id="custom1_link_<?php echo($id_setings); ?>">
    <label for="custom1_link_<?php echo($id_setings); ?>"> - link to your custom website 1</label>
    <br>
    <br>
    <input type="text" name="custom1_icon_link_<?php echo($id_setings); ?>" id="custom1_link_<?php echo($id_setings); ?>">
    <label for="custom1_icon_link_<?php echo($id_setings); ?>"> - link to your custom website 1 icon</label>
    <br>
    <br>

    <input type="checkbox" name="custom2_<?php echo($id_setings); ?>" id="custom2_<?php echo($id_setings); ?>">
    <label for="custom2_<?php echo($id_setings); ?>">Custom link 2</label>
    <br>
    <input type="text" name="custom2_link_<?php echo($id_setings); ?>" id="custom2_link_<?php echo($id_setings); ?>">
    <label for="custom2_link_<?php echo($id_setings); ?>"> - link to your custom website 2</label>
    <br>
    <br>
    <input type="text" name="custom2_icon_link_<?php echo($id_setings); ?>" id="custom2_link_<?php echo($id_setings); ?>">
    <label for="custom2_icon_link_<?php echo($id_setings); ?>"> - link to your custom website 2 icon</label>
    <br>
    <br>

    <input type="checkbox" name="custom3_<?php echo($id_setings); ?>" id="custom3_<?php echo($id_setings); ?>">
    <label for="custom3_<?php echo($id_setings); ?>">Custom link 3</label>
    <br>
    <input type="text" name="custom3_link_<?php echo($id_setings); ?>" id="custom3_link_<?php echo($id_setings); ?>">
    <label for="custom3_link_<?php echo($id_setings); ?>"> - link to your custom website 3</label>
    <br>
    <br>
    <input type="text" name="custom3_icon_link_<?php echo($id_setings); ?>" id="custom3_link_<?php echo($id_setings); ?>">
    <label for="custom3_icon_link_<?php echo($id_setings); ?>"> - link to your custom website 3 icon</label>

    <h4>Is aside element active?: <?php echo($active_aside_settings); ?></h4>
    <input type="checkbox" name="aside_switch_<?php echo($id_setings); ?>" id="aside_switch_<?php echo($id_setings); ?>" <?php if($active_aside_settings = 1){echo('checked');} ?>>
    <label for="aside_switch_<?php echo($id_setings); ?>">Enabling aside element in post pages while checked.</label>
    <br>

      <input type="hidden" name="settings_set_<?php echo($id_setings); ?>" value="<?php echo($id_setings); ?>">
      <br>
      <button type="submit" class="btn btn-primary">Save</button>
  </form>

      <!-- Add in PHP check if the settigns id is 1 than can not delete only one settings set. -->
    <?php
    if($id_setings != 1){
        echo('
        <form action="functions/settings_delete.php" method="post">
            <br>
            <input type="hidden" name="settings_id_'.$id_setings.'" value="'.$id_setings.'">
            <button type="submit" class="btn btn-danger">Delete settings Set '.$id_setings.'</button>
        </form>
      ');
    }
    ?>

</div>