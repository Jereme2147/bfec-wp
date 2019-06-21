<?php 
    get_header();
?>
<div class="banner-div">
    <!-- dynamic should be loaded from WP -->
    <img src="<?php echo get_template_directory_uri()?>/img/contact-banner-1900.jpg" class="desktop-img"alt="">
    <img src="<?php echo get_template_directory_uri()?>/img/contact-banner-900.jpg"class="mobile-img" alt="">
</div>
<div id="contact-social">
    <a href="#" target="_BLANK">
        <img src="<?php echo get_template_directory_uri()?>/img/facebook.svg" alt="">
    </a>
    <a href="#" target="_BLANK">
        <img src="<?php echo get_template_directory_uri()?>/img/linkedin.svg" alt="">
    </a>
    <a href="#" target="_BLANK">
        <img src="<?php echo get_template_directory_uri()?>/img/mail.svg" alt="">
    </a>
    <a href="#" target="_BLANK">
        <img src="<?php echo get_template_directory_uri()?>/img/phone.svg" alt="">
    </a>
    <a href="#" target="_BLANK">
        <img src="<?php echo get_template_directory_uri()?>/img/instagram.svg" alt="">
    </a>
</div>
<div id=contact-section-divs> 
<section class="contact-section">
    <div id="contact-address">
        <!-- <h2>Get in touch</h2> -->
        <h3>Brushy Fork Environmental Consulting, Inc</h3>
        <p>10565 Hwy 421</p>
        <p>Trade, TN 37691</p>
        <p><a href="#">info@bfec</a></p>
        <p>Connect with us on any of the provided social networks or a quick message.</p>
    </div>
</section>
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
            <section>
                <div>

                </div>
            </section>
    </div>
<?php 
    get_footer();
?>