<?php
    get_header();
?>

single-portfolio.php
<div class="banner-div">
    <!-- dynamic should be loaded from WP -->
    <img src="<?php echo get_template_directory_uri()?>/img/about-1500.png" class="desktop-img"alt="">
    <img src="<?php echo get_template_directory_uri()?>/img/about-600.png"class="mobile-img" alt="">
</div>
<?php
    include get_theme_file_path( '/portfolio-menu.php' );
?>
<?php

      while(have_posts()) {
            the_post();
?>
    <div class="no-banner-spacer">
    </div>
    <section class="single-section">
        <div>
        <?php 
            ?><h2><?php the_title();?></h2><?php
            echo the_content();
        ?>
        </div>
    </section>


<?php
      }
    get_footer();
?>