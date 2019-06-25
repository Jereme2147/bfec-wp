<?php
    get_header();
?>
single.php
<?php
      while(have_posts()) {
            the_post();
?>
    <div class="no-banner-spacer">
    </div>
    <section class="single-section">
        <?php 
                    $custom_field_keys = get_post_custom_keys();
                        foreach ( $custom_field_keys as $key => $value ) {
                            $valuet = $value;
                            if ( '_' == $valuet{0} )
                                continue;
                            if ($value == 'slide-show'){
                                $my_value = get_post_custom_values($valuet);
                                //echo $my_value{0};
                               soliloquy( $my_value{0}, 'slug' );
                                };
                            }
                ?>
        <div>
        <?php
            ?> <h2> <?php echo the_title();?> </h2>
            <?php
            echo the_content();
        ?>
        </div>
    </section>


<?php
      }
    get_footer();
?>