<?php 
    get_header();
?>
<!-- just for testing, to be removed -->
<!-- <div style="height: 80px;">Front damn page</div> -->
<div id="mobile-landing-slideshow">
    <?php
        if ( function_exists( 'soliloquy' ) ) { soliloquy( 'front-page', 'slug' ); };
    ?>
</div>
        <!-- only shows desktop -->
<div id="desktop-landing-slideshow">
    <!-- <img src="./img/desktop-landing1900.png" alt=""> -->
    <?php
    if ( function_exists( 'soliloquy' ) ) { soliloquy( 'front-page', 'slug' ); };
    ?>
</div>
<?php
 $the_query = new WP_Query( array('posts_per_page'=>6,
                                 'post_type'=>'landing-item',
                                 'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                            ); 
    $postCount = 0; //variable to push sections left or right
    while ($the_query -> have_posts()) : $the_query -> the_post(); 
    ?>
    <section class="<?php if($postCount % 2 == 1) {
                            echo 'card-right section-right ';
                            } else {
                                echo 'card-left section-left ';
                            }
        ?>landing-section" id="landing-section-1">
            <div class="landing-card">
                <div class="landing-card-title">
                        <h2><?php the_title(); ?></h2>
                    <div>
                        <p>
                           <?php echo wp_trim_words(get_the_excerpt(), 50);?>
                        </p>
                    </div>
                <div class="desktop-read-more-btn" id="desktop-stream-restoration-readmore">
                        <a href="<?php echo the_permalink();?>" target="_blank"><h3>Read More</h3></a>  
                </div>
                </div>
                <div class="landing-image-div">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="desktop-img side-load">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="mobile-img side-load">
                </div>
                <div class="read-more-btn" id="stream-restoration-readmore">
                        <a href="<?php echo the_permalink();?>" target="_blank"><h3>Read More</h3></a>  
                </div>
            </div>
        </section>

<?php
$postCount = $postCount + 1;
endwhile;
    get_footer();
?>