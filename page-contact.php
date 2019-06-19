<?php 
    get_header();
?>
contact page
<?php 
     while(have_posts()) {
        the_post();
        ?>
            <section class="contact-section-form">
            <div>
            <?php the_content();?>
            </div>
            <?php 
     }
?>
            </section>
<?php 
    get_footer();
?>