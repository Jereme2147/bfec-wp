<?php get_header(); 

?>
<div class="banner-div">
    <!-- dynamic should be loaded from WP -->
    <img src="<?php echo get_template_directory_uri()?>/img/about-1500.png" class="desktop-img"alt="">
    <img src="<?php echo get_template_directory_uri()?>/img/about-600.png"class="mobile-img" alt="">
</div>
<?php
 $the_query = new WP_Query( array('posts_per_page'=>4,
                                 'post_type'=>'post',
                                 'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                            ); 
                            ?>
<section class="news-section">
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
 
<div class="news-thumb">
        <a href="<?php echo the_permalink();?>">
            <h2><?php echo the_title();?></h2>
        </a>
        <a href="<?php echo the_permalink();?>" target="_BLANK"> <img 
            src="<?php echo the_post_thumbnail_url(); ?>" alt="portfolio image"></a>
    </div>




<?php
endwhile;
?>
</section>
    <div class="pagination">
<?php
$big = 999999999; // need an unlikely integer
 echo paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $the_query->max_num_pages
) );

wp_reset_postdata();
?>
    </div>
<?php get_footer();?>