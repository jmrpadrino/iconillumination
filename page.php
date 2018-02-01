<?php
    get_header();
    the_post();
    if ( is_page('contact-us') ){
        get_template_part('template-parts/content-contact-us');
    }else if( is_page('services') ){
        get_template_part('template-parts/content-services');
    }else if( is_page('about-us') ){
        get_template_part('template-parts/content-about-us');
    }else{
?>
            <section id="ramdom_page_content" class="randomPagecontent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
<?php   
    }

    get_footer();
?>