<?php 
    get_header();
?>
    <div class="banner-div">
    <!-- dynamic should be loaded from WP -->
        <img src="<?php echo get_template_directory_uri()?>/img/opportunities-1024x768.jpg" class="desktop-img"alt="">
        <img src="<?php echo get_template_directory_uri()?>/img/opportunities-1024x768.jpg"class="mobile-img" alt="">
    </div>
    <section>
        <?php 
            while(have_posts()) {
            the_post();
        ?>
            <div>
                <?PHP 
                    echo the_content();
                ?>
            </div>
        <?php 
            }
        ?>
    </section>
    page-jobs
<?php 
    get_footer();
?>