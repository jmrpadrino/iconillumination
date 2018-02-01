<?php 
    $prefix = 'iconillumination';
    $home = get_page_by_path('home'); 
    $hero_image = get_post_meta($home->ID, $prefix.'hero_image', true);
    $hero_string = get_post_meta($home->ID, $prefix.'seo_string', true);
?>
            <div class="hero text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if (!empty ($hero_image)){ ?>
                            <img class="brand-icon" src="<?php echo $hero_image; ?>" alt="Icon Illumination">
                            <?php }else{ ?>
                            <img class="brand-icon" src="<?php echo get_template_directory_uri(); ?>/images/icon-illumination-logo.png" alt="Icon Illumination">
                            <?php } ?>
                            <?php if (!empty ($hero_string)){ ?>
                            <h1 class="heroTitle"><?php echo $hero_string ?></h1>
                            <?php }else{ ?>
                            <h1 class="heroTitle">Lighting to perfection</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="discover text-center">
                <span>DISCOVER</span>
                <a id="gotoe" class="gotoe" href="#corpInfo"><span class="zmdi zmdi-chevron-down zmdi-hc-3x bounce"></span></a>
            </div>