<?php
    /*--------------------------------------
    Custom Post Types for Icon Illumination
    --------------------------------------*/

    // Register Custom Post Type for Products
    function cpt_project() {

        $labels = array(
            'name'                  => _x( 'Projects', 'Post Type General Name', 'iconillumination' ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'iconillumination' ),
            'menu_name'             => __( 'Projects', 'iconillumination' ),
            'name_admin_bar'        => __( 'Project', 'iconillumination' ),
            'archives'              => __( 'Item Archives', 'iconillumination' ),
            'attributes'            => __( 'Item Attributes', 'iconillumination' ),
            'parent_item_colon'     => __( 'Parent Item:', 'iconillumination' ),
            'all_items'             => __( 'All Items', 'iconillumination' ),
            'add_new_item'          => __( 'Add New Item', 'iconillumination' ),
            'add_new'               => __( 'Add New', 'iconillumination' ),
            'new_item'              => __( 'New Item', 'iconillumination' ),
            'edit_item'             => __( 'Edit Item', 'iconillumination' ),
            'update_item'           => __( 'Update Item', 'iconillumination' ),
            'view_item'             => __( 'View Item', 'iconillumination' ),
            'view_items'            => __( 'View Items', 'iconillumination' ),
            'search_items'          => __( 'Search Item', 'iconillumination' ),
            'not_found'             => __( 'Not found', 'iconillumination' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'iconillumination' ),
            'featured_image'        => __( 'Featured Image', 'iconillumination' ),
            'set_featured_image'    => __( 'Set featured image', 'iconillumination' ),
            'remove_featured_image' => __( 'Remove featured image', 'iconillumination' ),
            'use_featured_image'    => __( 'Use as featured image', 'iconillumination' ),
            'insert_into_item'      => __( 'Insert into item', 'iconillumination' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'iconillumination' ),
            'items_list'            => __( 'Items list', 'iconillumination' ),
            'items_list_navigation' => __( 'Items list navigation', 'iconillumination' ),
            'filter_items_list'     => __( 'Filter items list', 'iconillumination' ),
        );
        $rewrite = array(
            'slug'                  => 'projects',
            'with_front'            => false,
            'feeds'                 => true,
            'pages'                 => true,
        );
        $args = array(
            'label'                 => __( 'Project', 'iconillumination' ),
            'description'           => __( 'Icon Illumination Project', 'iconillumination' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-lightbulb',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'project', $args );

    }
    add_action( 'init', 'cpt_project', 0 );    

    // Register Custom Post Type for Services
    function cpt_testimonials() {

        $labels = array(
            'name'                  => _x( 'Testinomials', 'Post Type General Name', 'iconillumination' ),
            'singular_name'         => _x( 'Testinomial', 'Post Type Singular Name', 'iconillumination' ),
            'menu_name'             => __( 'Testinomials', 'iconillumination' ),
            'name_admin_bar'        => __( 'Testinomial', 'iconillumination' ),
            'archives'              => __( 'Item Archives', 'iconillumination' ),
            'attributes'            => __( 'Item Attributes', 'iconillumination' ),
            'parent_item_colon'     => __( 'Parent Item:', 'iconillumination' ),
            'all_items'             => __( 'All Items', 'iconillumination' ),
            'add_new_item'          => __( 'Add New Item', 'iconillumination' ),
            'add_new'               => __( 'Add New', 'iconillumination' ),
            'new_item'              => __( 'New Item', 'iconillumination' ),
            'edit_item'             => __( 'Edit Item', 'iconillumination' ),
            'update_item'           => __( 'Update Item', 'iconillumination' ),
            'view_item'             => __( 'View Item', 'iconillumination' ),
            'view_items'            => __( 'View Items', 'iconillumination' ),
            'search_items'          => __( 'Search Item', 'iconillumination' ),
            'not_found'             => __( 'Not found', 'iconillumination' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'iconillumination' ),
            'featured_image'        => __( 'Featured Image', 'iconillumination' ),
            'set_featured_image'    => __( 'Set featured image', 'iconillumination' ),
            'remove_featured_image' => __( 'Remove featured image', 'iconillumination' ),
            'use_featured_image'    => __( 'Use as featured image', 'iconillumination' ),
            'insert_into_item'      => __( 'Insert into item', 'iconillumination' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'iconillumination' ),
            'items_list'            => __( 'Items list', 'iconillumination' ),
            'items_list_navigation' => __( 'Items list navigation', 'iconillumination' ),
            'filter_items_list'     => __( 'Filter items list', 'iconillumination' ),
        );
        $args = array(
            'label'                 => __( 'Testinomials', 'iconillumination' ),
            'description'           => __( 'Icon Illumination Services', 'iconillumination' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'            => array( '' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-lightbulb',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
        );
        register_post_type( 'testimonials', $args );

    }
    add_action( 'init', 'cpt_testimonials', 0 );

?>