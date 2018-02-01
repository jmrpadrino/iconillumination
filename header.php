    <?php get_template_part('template-parts/head'); ?>

    <body id="top" <?php body_class(); ?>>
        <?php 
            if ( has_post_thumbnail() ){
                $backgroundImage = get_the_post_thumbnail_url( $id, 'large');
            }else{
                $backgroundImage = '';
                global $post;
                $post_slug = $post->post_name;
                $backgroundImage = get_template_directory_uri() . '/images/heros/' . $post_slug . '.png';
            }
        ?>
        <header class="theHeader" style="background-image: url(<?php echo $backgroundImage; ?>">
            <div class="headerMask"></div>
            <?php get_template_part('template-parts/the-navbar'); ?>
            <?php 
                if ( is_front_page() ){
                    get_template_part('template-parts/hero-home');
                }else{
                    get_template_part('template-parts/default-hero');
                }
            ?>
        </header>
        <main>