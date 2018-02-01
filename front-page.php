<?php get_header(); ?>
<?php 
    $prefix = 'iconillumination';
    $home = get_page_by_path('home'); 
    $serviceCopytext = get_post_meta($home->ID, $prefix.'serviceCopytext', true);
    $planningCopytext = get_post_meta($home->ID, $prefix.'planningCopytext', true);
    $distributionCopytext = get_post_meta($home->ID, $prefix.'distributionCopytext', true);
    $latestprojectsCopytext = get_post_meta($home->ID, $prefix.'latestprojectsCopytext', true);
    $quote = get_post_meta($home->ID, $prefix.'quote_string', true);
    $quoteAuthor = get_post_meta($home->ID, $prefix.'author_quote_string', true);
?>
            <section id="iconsBar"  class="iconsBar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="iconsContainer">
                                <?php for($i = 0; $i <=6; $i++){ ?>
                                <?php if (get_post_meta($home->ID, $prefix.'logo'.$i, true) ){ ?>
                                <span class="iconLink">
                                <?php if (get_post_meta($home->ID, $prefix.'logolink'.$i, true) ){ ?>
                                    <a href="<?php echo get_post_meta($home->ID, $prefix.'logolink'.$i, true); ?>" target="_blank">
                                        <img src="<?php echo get_post_meta($home->ID, $prefix.'logo'.$i, true); ?>" width="80">
                                    </a>
                                <?php }else{ ?>
                                    <img src="<?php echo get_post_meta($home->ID, $prefix.'logo'.$i, true); ?>" width="80">
                                <?php } ?>
                                </span>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="corpInfo" class="corpInfo">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                            <article class="descriptionBlock">
                                <h2 class="isHeading services">Services</h2>
                                <?php if (!empty ($serviceCopytext)){ ?>
                                <p class="homeServiceDescription"><?php echo $serviceCopytext; ?></p>
                                <?php }else{ ?>
                                <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                                <?php } ?>
                            </article>
                        </div>
                    </div>
                    <div class="row planningDistribution">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                            <article>
                                <div class="col-sm-6 homeImageframe planning">
                                    <a href="<?php echo home_url('planning-design'); ?>">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/planning-design.jpg" alt="Planning & Design">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="isHeading planning">Planning &amp; Design</h3>
                                    <?php if (!empty ($planningCopytext)){ ?>
                                    <p class="homeServiceDescription"><?php echo $planningCopytext; ?></p>
                                    <?php }else{ ?>
                                    <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                                    <?php } ?>
                                    <a href="<?php echo home_url('planning-design'); ?>" class="likeLink homeReadMore">Read More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row planningDistribution">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                            <article>
                                <div class="col-sm-6 col-sm-push-6 homeImageframe planning">
                                    <a href="<?php echo home_url('distribution-supply'); ?>">
                                        <img class="img-responsive pull-right" src="<?php echo get_template_directory_uri(); ?>/images/distribution-supply.jpg" alt="Distribution Supply">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-sm-pull-6">
                                    <h3 class="isHeading distribution">Distribution &amp; Supply</h3>
                                    <?php if (!empty ($distributionCopytext)){ ?>
                                    <p class="homeServiceDescription"><?php echo $distributionCopytext; ?></p>
                                    <?php }else{ ?>
                                    <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                                    <?php } ?>
                                    <a class="likeLink homeReadMore" href="<?php echo home_url('distribution-supply'); ?>">Read More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section id="quote" class="quote">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                            <article>
                                <p class="quoteMessage">
                                <?php  
                                    if (!empty ($quote)){
                                        echo $quote;
                                    }else{
                                        echo 'Please add the copy text in Home page editor window';
                                    } 
                                ?>
                                </p>
                                <span class="quoteSeparator"></span>
                                <span class="quoteAuthor likeLink">
                                    <?php  
                                        if (!empty ($quoteAuthor)){
                                            echo $quoteAuthor;
                                        }else{
                                            echo 'Please add the copy text in Home page editor window';
                                        } 
                                    ?>
                                </span>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section id="latestProjects">
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                <h2 class="isHeading latestProjects">Latest projects</h2>
                                <?php if (!empty ($latestprojectsCopytext)){ ?>
                                <p class="homeServiceDescription"><?php echo $latestprojectsCopytext; ?></p>
                                <?php }else{ ?>
                                <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="homeProductlist">
                            <div class="row">
                                <?php 
                                    $args = array(
                                        'post_type' => 'project',
                                        'posts_per_page' => 3
                                    );
                                    $projects = query_posts( $args );
                                    //var_dump($projects);
                                    foreach ( $projects as $project ){
                                        $img = get_the_post_thumbnail_url( $project->ID, 'small');
                                        if ( empty ($img ) ){
                                            $img = 'http://placehold.it/260/24292E/ffffff?text=%20';
                                        }
                                        $projectTitle = $project->post_title;
                                        $projectCategory = get_the_category( $project->ID );                                        
                                ?>
                                <article>
                                    <div class="col-sm-4">
                                        <div class="projectFrame" style="background-image: url(<?php echo $img; ?>); ">
                                            <span><?php echo $projectCategory[0]->name; ?></span>
                                            <h3><?php echo $projectTitle; ?></h3>
                                        </div>
                                    </div>
                                </article>
                                <?php } //End foreach ?>
                            </div>
                        </div>
                        <div class="row hidden-xs">
                            <div class="col-xs-12 text-center">
                                <a href="<?php echo home_url('projects'); ?>/" class="likeLink">View all Projects</a>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
            <section id="CTAgetIntouch" class="CTAgetIntouch">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center"><span>Like what you see? Start working with ud right away</span><a href="<?php  echo home_url('contact-us'); ?>" class="ctaButton">Get In Touch</a></div>
                    </div>
                </div>
            </section>
            <?php get_template_part('template-parts/the-testimonial-section'); ?>
<?php get_footer(); ?>