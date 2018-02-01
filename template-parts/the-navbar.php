            <nav id="topNavbar" class="navbar navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".theNavbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <?php 
                                    $prefix = 'iconillumination';
                                    $home = get_page_by_path('home'); 
                                    //var_dump($home);
                                    //get the meta for navbar logo
                                    $logo = get_post_meta($home->ID, $prefix.'logo', true);
                                    if (!empty ($logo)){
                                ?>
                                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo bloginfo( 'name' ); ?>" width="80"></a>
                                <?php
                                    }else{
                                ?>
                                <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo bloginfo( 'name' ); ?></a>
                                <?php } ?>
                            </div>
                            <?php 
                            $args = array(
                                'theme_location'    => 'main-nav',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse pull-right theNavbar',
                                'container_id'      => 'theNavbar',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker()
                            );
                            wp_nav_menu( $args );
                            ?>  
                        </div>
                    </div>
                </div>
            </nav>