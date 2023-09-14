<?php
    require('dbconn.php');
    try{
        $sql = "SELECT * FROM rob_settings"; //id_setings header_position_settings header_image_settings active_settings blog_name_settings active_footer_social_settings active_aside_settings
        foreach ($conn->query($sql) as $row){
              $id_setings = $row['id_setings'];
              $header_position_settings = $row['header_position_settings'];
              $header_image_settings = $row['header_image_settings'];
              $active_settings = $row['active_settings'];
              $blog_name_settings = $row['blog_name_settings'];
              $active_footer_social_settings = $row['active_footer_social_settings'];
              $active_aside_settings = $row['active_aside_settings'];

              echo('');

            }
            $conn = null;
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      $conn = null;
    }
?>

<div id="settings_holder" style="padding: 20px;">
  <form action="functions/settings_update.php" method="post">

    <h1>Settings Set</h1>

    <h4>Settings set: <?php echo($id_setings); ?></h4>

    <h4>Header possition: <?php echo($header_position_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="middle" name="header_possition" value="middle" checked />
          <label for="middle">Middle</label>
        </div>
        <div>
          <input type="radio" id="" name="header_possition" value="left" />
          <label for="left">Left</label>
        </div>
        <div>
          <input type="radio" id="right" name="header_possition" value="right" />
          <label for="right">Right</label>
        </div>
      </fieldset>

    <h4>Header image settings: <?php echo($header_image_settings); ?></h4>
      <fieldset>
        <div>
          <input type="radio" id="fill" name="header_image_possition" value="fill" checked />
          <label for="fill">Fill</label>
        </div>
        <div>
          <input type="radio" id="" name="header_image_possition" value="center" />
          <label for="center">Center</label>
        </div>
        <div>
          <input type="radio" id="right" name="header_image_possition" value="repeat" />
          <label for="repeat">Repeat</label>
        </div>
      </fieldset>

    <h4>Is settings set active?: <?php echo($active_settings); ?></h4>
    <input type="checkbox" name="set_settings_active" id="set_settings_active">
    <label for="set_settings_active">Set this setting as active. (If more than one settings set is set this way, the first one in database will be chosen.)</label>


    <h4>Header name of the website: </h4><input type="text" name="website_name" id="website_name" value="<?php echo($blog_name_settings); ?>" >
    <label for="website_name"> - Change name of the website</label>

    <h4>Are socials on the footer active?: <?php echo($active_footer_social_settings); ?></h4>

    <h4>Is aside element active?: <?php echo($active_aside_settings); ?></h4>
    <!-- Add in PHP check if the settigns id is 1 than can not delete only one settings set ! -->
      <input type="hidden" name="settings_set" value="<?php echo($id_setings); ?>">
      <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

<form action="functions/add_settings_set.php" method="post" style="padding: 20px; border-top: 1px solid #dee2e6;">
    <button type="submit" class="btn btn-primary">Add settings set</button>
</form>