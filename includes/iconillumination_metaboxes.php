<?php
    ////////////////////////////////////////
    // METABOXES
    ////////////////////////////////////////
    add_filter( 'rwmb_meta_boxes', 'sentry_register_meta_boxes' );
    /*-- METABOXES --*/
    function sentry_register_meta_boxes( $meta_box ) {
        
        $prefix = 'iconillumination';
        
        // Check if plugin is activated or included in theme

        if (!class_exists('RW_Meta_Box') or ! is_admin())
            return;

        $post_ID = !empty($_POST['post_ID']) ?
                $_POST['post_ID'] :
                (!empty($_GET['post']) ? $_GET['post'] : FALSE);

        if (!$post_ID)
            return;

        $current_post = get_post($post_ID);
        $current_post_type = $current_post->post_type;
        
        if($current_post_type = 'page'){
            if ($current_post->post_name != 'home' and $current_post->post_name != 'about-us' and $current_post->post_name != 'products' and $current_post->post_name != 'services' and $current_post->post_name != 'contact'){
                    $meta_box[] = array(
                        'id' => 'page_metas',
                        'title' => 'Icon Illumination Page Meta Information',
                        'pages' => array('page'),
                        'context' => 'normal',
                        'priority' => 'high',
                        'fields' => array(
                            array(
                                'name' => 'Hero text',
                                'desc' => '<strong>Info!:</strong> This text will be desplayed over the top image.',
                                'id' => $prefix .'hero_text',
                                'type' => 'text',
                            )
                        )
                    );
                }; // END if       
        };
        if ( $current_post->post_name == 'about-us' ) {
            $meta_box[] = array(
                'id' => 'our_company',
                'title' => '<span class="dashicons dashicons-info"></span> Our Company section',                
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Our Company section title',
                        'id' => $prefix .'out_company_title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Our Company section content',
                        'id' => $prefix .'out_company_content',
                        'type' => 'wysiwyg',
                    )
                )   
            );
            $meta_box[] = array(
                'id' => 'our_team',
                'title' => '<span class="dashicons dashicons-info"></span> Our Team section',                
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Our Team section title',
                        'id' => $prefix .'out_team_title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Our Team section content',
                        'id' => $prefix .'out_team_content',
                        'type' => 'wysiwyg',
                    )
                )   
            );
            
            $meta_box[] = array(
                'id' => 'our_company_quote',
                'title' => '<span class="dashicons dashicons-info"></span> Our Company quote section',                
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                   array(
                        'name' => 'Quote',
                        'id' => $prefix .'about_quote_string',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Author',
                        'id' => $prefix .'about_author_quote_string',
                        'type' => 'text',
                    )
                )   
            );
        }
        //Metaboxes for Contact Page
        if ( $current_post->post_name == 'home' ) {
            $meta_box[] = array(
                'id' => 'logo_home',
                'title' => '<span class="dashicons dashicons-info"></span> Navigation Logo',                
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Upload Logo',
                        'desc' => 'For better results, must upload an image in PNG format not larger than 100px width and height for propper design functionality.',
                        'id' => $prefix .'logo',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    )
                )   
            );
            $meta_box[] = array(
                'id' => 'hero_home',
                'title' => '<span class="dashicons dashicons-info"></span> Hero Content',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'SEO string',
                        'id' => $prefix .'seo_string',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Upload Image',
                        'desc' => 'For better results, must upload an image in PNG format not larger than 100px width and height for propper design functionality.',
                        'id' => $prefix .'hero_image',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    )
                )   
            );
            $meta_box[] = array(
                'id' => 'clients_home',
                'title' => '<span class="dashicons dashicons-info"></span> Clients Bar',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Upload Client\'s Logo 1',
                        'id' => $prefix .'logo1',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 1',
                        'id' => $prefix .'logolink1',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Upload Client\'s Logo 2',
                        'id' => $prefix .'logo2',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 2',
                        'id' => $prefix .'logolink2',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Upload Client\'s Logo 3',
                        'id' => $prefix .'logo3',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 3',
                        'id' => $prefix .'logolink3',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Upload Client\'s Logo 4',
                        'id' => $prefix .'logo4',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 4',
                        'id' => $prefix .'logolink4',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Upload Client\'s Logo 5',
                        'id' => $prefix .'logo5',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 5',
                        'id' => $prefix .'logolink5',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'Upload Client\'s Logo 6',
                        'id' => $prefix .'logo6',
                        'type' => 'file_input',
                        'max_file_uploads' => 1
                    ),
                    array(
                        'name' => 'Link Client\'s Logo 6',
                        'id' => $prefix .'logolink6',
                        'type' => 'url',
                    ),
                )   
            );
            
            $meta_box[] = array(
                'id' => 'main_content',
                'title' => '<span class="dashicons dashicons-info"></span> Main Content Info',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                        array(
                            'name' => 'Services copy text',
                            'id' => $prefix .'serviceCopytext',
                            'type' => 'textarea',
                        ),
                        array(
                            'name' => 'Planning & Design copy text',
                            'id' => $prefix .'planningCopytext',
                            'type' => 'textarea',
                        ),
                        array(
                            'name' => 'Distribution & Supply copy text',
                            'id' => $prefix .'distributionCopytext',
                            'type' => 'textarea',
                        ),
                        array(
                            'name' => 'Latest Projects copy text',
                            'id' => $prefix .'latestprojectsCopytext',
                            'type' => 'textarea',
                        )
                    )
            );
            $meta_box[] = array(
                'id' => 'quote_home',
                'title' => '<span class="dashicons dashicons-info"></span> Home Quote',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Quote',
                        'id' => $prefix .'quote_string',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Author',
                        'id' => $prefix .'author_quote_string',
                        'type' => 'text',
                    ),
                )   
            );
        };
        
        //Metaboxes for Contact Page
        if ($current_post->post_name == 'contact-us') {
            $meta_box[] = array(
                'id' => 'social_media',
                'title' => '<span class="dashicons dashicons-info"></span> Contact Info',
                'pages' => array('page'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'name' => 'Email',
                        'desc' => '<strong>Tip!:</strong> mymail@myweb.com',
                        'id' => $prefix .'em',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Twitter',
                        'desc' => '<strong>Tip!:</strong> https://twitter.com/username',
                        'id' => $prefix .'tw',
                        'type' => 'url',
                    ),
                    array(
                        'name' => 'LinkedIn',
                        'desc' => '<strong>Tip!:</strong> https://www.facebook.com/username',
                        'id' => $prefix .'fb',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Google Plus',
                        'desc' => '<strong>Tip!:</strong> https://www.gplus.com/username',
                        'id' => $prefix .'gp',
                        'type' => 'text',
                    )
            ));
        };
        
        
        return $meta_box;
    }
    /*----- FIN DE LOS METABOXES -----*/

    function trademark() {
        echo "<!-- Dev by Jose Manuel Rodriguez Padrino and Designed by Gaetan Maesson | email: jrodriguez@webcreek.com -->";
    }
    add_action( 'wp_head', 'trademark', 5 );
?>