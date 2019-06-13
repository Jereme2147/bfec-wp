<?php 
    get_header();
    while(have_posts()){
        the_post();
    
?>page
<h2 class="page-heading"><?php the_title(); ?></h2>
        <div id="post-container">
            <section id="blogpost">
                <div class="card">
                <?php if(has_post_thumbnail()) { ?>
                    <div class="card-image">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="card image">
                    </div>
                <?php } ?>
                    <div class="card-description">
                        <?php the_content(); 
                        the_excerpt();
                        $custom_field_keys = get_post_custom_keys();
                        foreach ( $custom_field_keys as $key => $value ) {
                            $valuet = $value;
                            if ( '_' == $valuet{0} )
                            continue;
                            $my_value = get_post_custom_values($valuet);
                            echo $value . ' ' . $my_value{0} . "<br />";
                            }
                        ?>
                    </div>
                </div>
            </section>

            <?php } ?>

<?php 
    get_footer();
?>