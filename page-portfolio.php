<?php
    get_header();
?>
<div class="banner-div">
    <!-- dynamic should be loaded from WP -->
    <img src="<?php echo get_template_directory_uri();?>/img/j-hook-1900.jpg" class="desktop-img"alt="">
    <img src="<?php echo get_template_directory_uri();?>/img/j-hook-600.jpg"class="mobile-img" alt="">
</div>
page-portfolio.php
<?php
    //include the menu
    include get_theme_file_path( '/portfolio-menu.php' );
?>
<!-- gets all portfolio items -->
<section id="portfolio-thumb" class="card-left">
    <?php
    $posts = get_posts( array('posts_per_page'=> -1,
                            'post_type'=>'portfolio'
                            // 'order' => 'ASC'
                    )); 
    foreach ($posts as $post) :
    setup_postdata($post)
    ?>
    <div class="portfolio-thumb-container ">
        <span><?php foreach((get_the_category()) as $category) {
                        $postcat= $category->cat_ID;
                        $catname =$category->cat_name;
                        echo $catname;
    } ?></span>
        <a href="<?php echo the_permalink();?>" target="_BLANK"> <img 
            src="<?php echo the_post_thumbnail_url(); ?>" alt="portfolio image"></a>
    </div>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
</section>


<?php
    get_footer();
?>