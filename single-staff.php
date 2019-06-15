<?php
    get_header();
    while(have_posts()) {
            the_post();
            $post_id = get_the_id();
            // echo the_content();
?>
<div class="no-banner-spacer">

</div>
<div class="staff-single-container">
    <div class="staff-single-title-image-bio">
        <div class="staff-single-name-title">
            <h3>
                <?php
                    echo the_title();
                ?>
            </h3>
            <h4>-
                <?php
                    $custom_field_keys = get_post_custom_keys();
                        foreach ( $custom_field_keys as $key => $value ) {
                            $valuet = $value;
                            if ( '_' == $valuet{0} )
                                continue;
                            if ($value == 'Job Title'){
                                $my_value = get_post_custom_values($valuet);
                                echo $my_value{0};
                                };
                            }
                ?>
            </h4>
        </div>
        <div class="staff-single-image">
            <img src="
            <?php 
                if (wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'second_image', true),'full')){
                    echo wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'second_image', true),'full');
                } else {
                    echo get_the_post_thumbnail_url();
                }
             ?>
             " alt="">
        </div>
    
        <div class="staff-single-bio">
            <p>
                <?php
                    echo get_the_excerpt();
                ?>
            </p>
        </div>
    </div>
    <div class="staff-single-qual-expert">
        <?php
            echo the_content();
        ?>
           
        </div>
    </div>
</div>
<?php
    }
    get_footer();
?>