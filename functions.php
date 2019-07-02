<?php
function bfec_setup() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Oswald|Raleway|Roboto&display=swap' );
    //wp_enqueue_style('style', get_stylesheet_uri().'style.min.css', NULL, microtime(), all);
     $located = locate_template( 'style.min.css' );
     if ($located != '' ) {
          echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/style.min.css" />';
     } else {
          echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/style.css" />';
     }
    //version must change every time we change css, change microtime to 
    //version number after finished developement. 
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);

}

add_action('wp_enqueue_scripts', 'bfec_setup');

function bfec_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', 
    array('comment-list', 'comment-form', 'search-form'));
}

add_action('after_setup_theme', 'bfec_init');

// staff post type
function bfec_custom_post_type() {
    register_post_type('staff', 
    array(
        'rewrite' => array('slug' => 'employees'),
        'labels' => array(
            'name' => 'Employees', 
            'singular_name' => 'staff',
            'add_new_item' => 'Add Name',
            'edit_item' => 'Edit employee'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('Job Title')
        ));

        register_post_type('opportunity', 
        array(
        'rewrite' => array('slug' => 'opportunities'),
        'labels' => array(
            'name' => 'Opportunities', 
            'singular_name' => 'opportunity',
            'add_new_item' => 'Add opportunity',
            'edit_item' => 'Edit opportunity'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('Job Opening')
        ));
        
        register_post_type('landing-item', 
            array(
        'rewrite' => array('slug' => 'landing-items'),
        'labels' => array(
            'name' => 'landing-items', 
            'singular_name' => 'landing-item',
            'add_new_item' => 'Add Landing Item',
            'edit_item' => 'Edit Landing Item'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        )
        ));

        register_post_type('portfolio', 
        array(
        'rewrite' => array('slug' => 'portfolio-items'),
        'labels' => array(
            'name' => 'Portfolio-items', 
            'singular_name' => 'Portfolio',
            'add_new_item' => 'Add Portfolio Item',
            'edit_item' => 'Edit Portfolio Item'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('category', 'sub-category')
        ));
        
}
add_action('init', 'bfec_custom_post_type');
//front page items
// following code adds more images to employee and portfolio custom post types.
function mySearchFilter($articleQuery) {
    if( isset($_GET['search-type']) && $_GET['search-type']){
        $type = $_GET['search-type'];
    }
    if ($articleQuery->is_search && $type == 'blog') {
        $articleQuery->set('post_type', 'post');
    };
    return $articleQuery;
};

add_filter('pre_get_posts','mySearchFilter');


add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){
    //on which post types should the box appear?
    $post_types = array('staff','portfolio');
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'yourdomain'),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('second_image','third_image');

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image','yourdomain'); ?></a><br>
            <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','yourdomain'); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','yourdomain'); ?>',
            button: {
                text: '<?php _e('select image','yourdomain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('second_image','third_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}
// END the code that adds more images to employee and portfolio custom post types.
