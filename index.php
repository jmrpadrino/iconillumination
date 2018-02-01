<?php get_header('project-view'); ?>
<?php set_query_var('paged', $paged); ?>
            <section id="archiveContainer"  class="archiveContainer">
                <div class="container-fluid">
                    <div class="row theFlex">
                        <div class="col-sm-4 backgroundGray">
                            <aside class="aside-list">
                                <h3 class=" list-title">Categories</h3>
                                <ul class="category-list">
                                    <?php 
                                        $args = array(
                                            'echo' => true,
                                            'depth' => 0,
                                            'hide_empty' => false,
                                            'title_li' => ''
                                        );
                                        wp_list_categories( $args ); 
                                    ?>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-sm-8 list-of-posts">
                            <?php 
                                if ( have_posts() ){
                                    // print he posts
                                    while ( have_posts() ){ the_post();
                            ?>
                            <article>
                                <h2 class="isHeading"><?php the_title(); ?></h2>
                                <?php the_category(); ?>
                                <div class="projectContentcontainer">
                                    <?php the_content(); ?>
                                </div>
                                <hr />
                            </article>
                            <?php 
                                    }
                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php echo get_previous_posts_link('<i class="zmdi zmdi-chevron-left"></i>'); ?>
                                </div>
                                <div class="col-md-6 text-center">
                                    <?php numeric_posts_nav(); ?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo get_next_posts_link('<i class="zmdi zmdi-chevron-right"></i>'); ?> 
                                </div>
                            </div>
                            <?php 
                                }else{
                                    // print no posts
                            ?>
                            <article>
                                <h3 class="noPostsmessage">There is no projects yet!, please go add some project to the page.</h3>
                            </article>
                            <?php
                                }
                            ?>
                        </div>  
                    </div>
                </div>
            </section>
<?php get_footer(); ?>