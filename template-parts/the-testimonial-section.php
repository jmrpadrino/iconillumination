            <section id="testimonials" class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2 class="isHeading testimonials">Testimonials</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <?php 
                                $args = array(
                                    'post_type' => 'testimonials',
                                    'posts_per_page' => 5
                                );
                                $testimonials = get_posts($args);
                            ?>
                            <div id="sliderTestimonial" class="owlcarousel slider">
                                <?php foreach( $testimonials as $testimonial ){ ?>
                                <div class="slide">
                                    <p class="testimonial-content"><?php echo $testimonial->post_content; ?></p>
                                    <span class="quoteSeparator"></span>
                                    <span class="testimonial-author likeLink"><?php echo $testimonial->post_title; ?></span>
                                </div>
                                <?php } //END FOREACH ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>