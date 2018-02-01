<?php

/* Auxiliar scripts */
require_once('includes/wp_bootstrap_navwalker.php');
require_once('includes/class-tgm-plugin-activation.php');
require_once('includes/iconillumination_cpt.php');
require_once('includes/iconillumination_metaboxes.php');


function iconillumination_setup(){

    /* Theme translation */
    load_theme_textdomain( 'iconillumination', get_template_directory() . '/languages' );

    /* Theme components */
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-thumbnails' );

    /* Enqueuing Styles and Sripts */
    function add_theme_scripts() {

        // Load a copy of jQuery from the Google API CDN  
        // The last parameter set to TRUE states that it should be loaded  
        // in the footer.
        wp_deregister_script('jquery');  
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true);  
        wp_enqueue_script('jquery');  
        
        // Including Bootstrap, Owlcarousel and PrettyPhoto files
        wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'bootstrap_theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'owlslider', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltransition', get_template_directory_uri() . '/css/owl.transitions.css', array(), '2.2.0', null );
        wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
        wp_enqueue_script( 'owlsliderjs', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', array('jquery'), null, true );

        // Including theme styles
        wp_enqueue_style( 'iconillumination_common', get_template_directory_uri() . '/css/iconillumination_common.css', array(), '1.1', 'all');
        wp_enqueue_style( 'iconillumination_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), '', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_register_script( 'iconillumination', get_template_directory_uri() .'/js/iconillumination.js', array('jquery') );
        wp_localize_script( 'iconillumination', 'iconilluminationAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

        wp_enqueue_script( 'iconillumination', get_template_directory_uri() . '/js/iconillumination.js', array ( 'jquery' ), '1.1', true);
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

    /* Theme Navigation */
    if (function_exists('register_nav_menus')) {
        register_nav_menus( array(
            'main-nav' => __( 'Main Navigation', 'iconillumination' ),
            'footer-nav' => __( 'Footer Navigation', 'iconillumination' ),
        ) );
    };

    function remove_menus(){
        remove_menu_page( 'edit.php' );
    }
    add_action( 'admin_menu', 'remove_menus' );

    // Sentry register required plugins
    function iconillumination_register_required_plugins() {

        $plugins = array(
            array(
                'name'      => 'Meta Box',
                'slug'      => 'meta-box',
                'required'  => true,
                'force_deactivation' => true,
                'is_automatic' => true
            ),
            array(
                'name'      => 'WP Super Cache',
                'slug'      => 'wp-super-cache',
                'required'  => false,
            )
        );

        $config = array(
            'id'           => 'iconillumination',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );
        tgmpa( $plugins, $config );
    }
    add_action( 'tgmpa_register', 'iconillumination_register_required_plugins' );

}
add_action( 'after_setup_theme', 'iconillumination_setup' );

/* ordering archive page */
add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
    if(is_archive()):
     //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
       //Set the order ASC or DESC
       $query->set( 'order', 'ASC' );
       //Set the orderby
       $query->set( 'orderby', 'id' );
    endif;    
};

/* add CPT to category page*/
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {

  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'project'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}


/* Pagination Support */

function numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation">';
    echo '<div class="row">';
    
    //	Previous Post Link 
    echo '<div class="col-sm-3">';
    if ($paged == 1){
        echo '<span class="deactivated-nav">PREVIOUS</span>';
    }else{
        if ( get_previous_posts_link() )
        echo get_previous_posts_link('PREVIOUS');   
    }
    echo '</div>';
    echo '<div class="col-sm-6 text-center">';
    
    // List begins
    echo '<ul class="list-inline">' . "\n";
    
    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    
    // List ends
    echo '</ul></div>' . "\n";
    
    // Next Post Link
    echo '<div class="col-sm-3 text-right">';
    if ( $paged == $max ){
        echo '<span class="deactivated-nav">NEXT</span>';
    }else{
        if ( get_next_posts_link() )
        echo get_next_posts_link('NEXT');   
    }
    echo '</div>';
    
    // Close navigation row and container
    echo '</div>';
    echo '</div>';

}

/* Send ajax mail */
function send_mail_via_ajax(){

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $subject = filter_input(INPUT_POST, 'subject');
    $message = filter_input(INPUT_POST, 'message');

    // Google reCaptcha features
    $secret = "6LcxGBIUAAAAAFb8fviBHQGneE7KjP7XJLuUwDql";
    $response = null;

    $path = 'https://www.google.com/recaptcha/api/siteverify?';
    $path .= 'secret=' . $secret;
    $path .= '&remoteip=' . $_SERVER["REMOTE_ADDR"];
    $path .= '&v=php_1.0';
    $path .= '&response='. $_POST["g-recaptcha-response"];

    $response = file_get_contents( $path );

    $answers = json_decode($response, true);

    if ( $response != null && trim($answers ['success']) == true ) {


        ob_start();
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana !important;">
        <tr style="background-image: url(http://icon.choclomedia.com/wp-content/themes/icon-illumination-theme/images/heros/contact-us.png); background-size: cover; background-position: center;">
            <td align="center">
                <h1 style="font-size: 4em; color: white; margin-top: 40px; margin-bottom: 30px;">Icon Illumination</h1>
            </td>
        </tr>
        <tr>
            <td style="color:#222222!important; padding: 30px;">
                <h1 style="text-align:center;font-size:36px;color:#0080ff;text-transform:uppercase;font-weight:800;">Web Contact</h1>
                <h2 style="color:#0080ff;text-transform:uppercase;font-weight:800;margin-top: 35px;">Contact Information</h2>
                <p><strong>Full Name:</strong> <?php echo $name ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                <p><strong>Subject:</strong> <?php echo $subject ?></p>
                <h2 style="color:#0080ff;text-transform:uppercase;font-weight:800;margin-top: 70px;">Message</h2>
                <p style="font-size:20px;"><?php echo $message ?></p>
            </td>
        </tr>
        <tr style="background-color: #0080ff; color: #ffffff; margin-top: 35px;">
            <td align="center">
                <p style="margin-top:35px;margin-bottom:35px;">This mail was sent via Icon Illumination Website, on <strong><?php echo date("d/m/Y") ?></strong> at <?php echo date("h:i") ?></p>
            </td>
        </tr>
    </table>
</table>
<?php
            $body = ob_get_clean();

        //$contacto = get_page_by_path('contact');
        //$mail_admin = get_post_meta($contacto->ID, 'em', true);
        //$to = 'colocar un solo email';
        $subject = 'New contact message - Icon Illumination';
        $asunto = 'New contact message - Icon Illumination';

        require_once ABSPATH . WPINC . '/class-phpmailer.php';

        $mail = new PHPMailer( true );

        //$mail->AddAddress($to);
        $mail->AddAddress('hello@gaetanmasson.me', 'First Contact');
        $mail->FromName = 'Icon Illumination - Contact';
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML();
        $mail->CharSet = 'utf-8';
        $mail->Send();
        echo 'success';
        /*try {
            $mail->AddAddress($to);
            $mail->FromName = 'Sentry Wellhead Systems - Contact';
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->IsHTML();
            $mail->CharSet = 'utf-8';
            $mail->Send();
            echo trim($answers ['success']);
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo trim($answers ['success']);
          echo $e->getMessage(); //Boring error messages from anything else!
        }*/
    }else{
        echo trim($answers ['success']);
    }
}
add_action('wp_ajax_send_mail_via_ajax', 'send_mail_via_ajax');
add_action('wp_ajax_nopriv_send_mail_via_ajax', 'send_mail_via_ajax');
?>