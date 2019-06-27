<?php
    get_header();
?>
<div id="mission-statement">
    <p>
        <quote>"We’ve made it our mission to <strong>enhance our natural resources</strong> through the 
        <strong>restoration and conservation</strong> of our aquatic ecosystems and their surrounding lands."</quote>
    </p>
</div>
<div class="banner-div">
    <!-- dynamic should be loaded from WP -->
    <img src="<?php echo get_template_directory_uri()?>/img/about-1500.png" class="desktop-img"alt="">
    <img src="<?php echo get_template_directory_uri()?>/img/about-600.png"class="mobile-img" alt="">
</div>
<section  id="about-div">
    <div>
    <h2>About Us</h2>
    <p class="card-left">
    &nbsp; &nbsp; &nbsp; &nbsp;Brushy Fork Environmental Consulting provides full delivery ecological restoration 
    projects to the mountain areas of NC, TN, & VA. Our team of consultants, biologists, 
    and engineers are able to provide design & build services from assessment and design 
    through implementation on various projects ranging from mitigation banking to private 
    or grant funded restoration. We at Brushy Fork love our jobs and where we get to 
    live! We are highly motivated and efficient; ensuring that our stream restoration 
    projects are self-sustaining and resilient. The BFEC team is also thoroughly trained 
    in all aspects of surface water hydrology, stream/wetland delineations, jurisdictional 
    determinations, stream and wetland ecology, environmental regulations, and GIS-based 
    analysis; allowing us to offer a broad array of environmental services. Together we 
    provide high quality environmental solutions to the public; reflected in our lasting 
    relationships with clients and partners.
    </p>
</div>
</section>
<section class="about-section card-right" id="staff-div">
    <h2>The BFEC Team</h2>
    <?php
 $posts = get_posts( array('posts_per_page'=> -1,
                                 'post_type'=>'staff',
                                 'meta_key' => 'position',
                                 'orderby' => 'meta_value_num',
                                 'order' => 'ASC'
                            )); 
    $postCount = 0; //variable to push sections left or right
    foreach ($posts as $post) :
    setup_postdata($post)
    ?>
        <div class="about-employee">
        <a href="<?php the_permalink()?>" target="_BLANK">
            <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
            <h4><?php echo the_title(); echo the_post('orderby');?></h4>
            <p><?php 
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
                             echo get_post_custom_values('position');
                ?> </p>
        </a>
    </div>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
</section>

<section class="about-section card-left" id="opportunities-div">
<!-- all should by dynamicly loaded. -->
    <h2>Opportunities</h2>
    <?php
        $the_query = new WP_Query( array('posts_per_page'=>10,
                                 'post_type'=>'opportunity',
                                 'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                                ); 
        while ($the_query -> have_posts()) : $the_query -> the_post(); 
    ?>
    <div class="opportunities-div">
        <a href="<?php the_permalink()?>" target="_BLANK">
            <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
            <h4><?php echo the_title();?></h4>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </a>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
    ?>
    </div>
</section>
<?php
    
    get_footer();
?>