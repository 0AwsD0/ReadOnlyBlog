<div class="row footer_links justify-content-md-center">
                <?php
                if($active_footer_settings == 1){
                        $sql = "SELECT * FROM rob_footer";
                        foreach($conn->query($sql) as $row){
                                $name_footer = $row['name_footer'];
                                $link_footer = $row['link_footer'];
                                $image_footer = $row['image_footer'];
                                echo('
                                <div class="col-auto">
                                <a href="'.$link_footer.'" target="_blank" class="footer_link_text"><img src="'.$image_footer.'" alt="[Link] " class="footer_link_image"> '.$name_footer.'</a>
                                </div>
                                ');
                        }
                }
                ?>
</div>
<div class="row footer justify-content-md-center">
            <div class="col-auto">
                    &copy <?php echo(date("Y")); ?> | Powered by: <a href="https://github.com/0AwsD0/ReadOnlyBlog" target="_blank" style="text-decoration: none;">Read Only Blog</a>
            </div>
</div>