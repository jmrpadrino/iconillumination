        </main>
        <footer class="theFooter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                        <?php 
                        $args = array(
                            'theme_location'    => 'footer-nav',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'theNavbar footerNavbar',
                            'container_id'      => 'the-footer-navbar',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker()
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>
                <div class="row addBorderTop">
                    <div class="col-sm-4">
                        <p class="footer-text">Jl. Amil no. 7, Pejaten Jakarta 12510, Indonesia</p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <p class="footer-text">info@iconillumination.com</p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <p class="footer-text">+62-21-7970262 / +62-812-2233-4455</p>
                    </div>
                </div>
            </div>

        </footer>
        <?php wp_footer(); ?>
    </body>
</html>