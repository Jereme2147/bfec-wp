<?php 
    get_header();
?>
<div>
    <?php
    if ( function_exists( 'soliloquy' ) ) { soliloquy( 'front-page', 'slug' ); };
    ?>
</div>

<?php
 $the_query = new WP_Query( array('posts_per_page'=>6,
                                 'post_type'=>'landing-item',
                                 'meta_key' => 'position',
                                 'orderby' => 'meta_value_num',
                                 'order' => 'ASC',
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
?>
<div class="landing-divider">
    <img src= "<?php echo get_template_directory_uri();?>/img/logo.png" alt="">
    <h2>BFEC News</h2>
</div>

<section>
<?php
 $the_query = new WP_Query( array('posts_per_page'=>6,
                                 'post_type'=>'post',
                                //  'meta_key' => 'position',
                                //  'orderby' => 'meta_value_num',
                                //  'order' => 'ASC',
                                 'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                            ); 
    while ($the_query -> have_posts()) : $the_query -> the_post(); 
    ?>
<!-- news / posts go here -->
        <div class="<?php if($postCount % 2 == 1) {
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
        </div>         
<!-- end news / posts -->
<?php
        $postCount = $postCount + 1;
    endwhile;
?>
</section>
<?php 
    get_footer();
?>