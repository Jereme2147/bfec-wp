
<?php 
    get_header();
?>
<div class="banner-div">

</div>
<?php
    include get_theme_file_path( '/portfolio-menu.php' );
?>
 <?php
    $postCount = 0;
    $posts = get_posts( array('posts_per_page'=> -1,
                            'post_type'=>'portfolio'
                            // 'order' => 'ASC'
                    )); 
    foreach ($posts as $post) :
    setup_postdata($post);
    foreach((get_the_category()) as $category) {
                    $postcat= $category->cat_ID;
                    $catname =$category->cat_name;
                    if($catname == 'Mitigation'){
        ?>
        <section class="<?php if($postCount % 2 == 1) {
                                    echo 'card-right section-right ';
                                } else {
                                    echo 'card-left section-left ';
                                }
                        ?>landing-section" id="landing-section-1">
            <?php $postCount = $postCount + 1; ?>
            <div class="landing-card">
                <div class="landing-card-title">
                    <h2><?php the_title();?></h2>
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
                
                    }
                
    } ?>
     
<?php
    endforeach;
    wp_reset_postdata();
    ?>
<?php
    get_footer();
?>