<?php get_header('project-view'); ?>
            <section id="archiveContainer"  class="archiveContainer">
                <div class="container-fluid">
                    <div class="row theFlex">
                        <div class="col-sm-8 col-sm-push-4 list-of-posts">
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
                            <?php numeric_posts_nav(); ?>
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
                        <div class="col-sm-4 col-sm-pull-8 backgroundGray">
                            <aside class="aside-list">
                                <h3 class=" list-title">Categories</h3>
                                <ul class="category-list">
                                    <li class="current-cat"><a href="<?php echo esc_url( $all_posts_url ); ?>">All categories</a></li>
                                    <?php 
                                        $args = array(
                                            'echo' => true,
                                            'depth' => 0,
                                            'hide_empty' => true,
                                            'title_li' => ''
                                        );
                                        wp_list_categories( $args ); 
                                        $all_posts_url = get_post_type_archive_link( 'project' );
                                    ?>
                                </ul>
                            </aside>
                        </div> 
                    </div>
                </div>
            </section>
<?php get_footer(); ?>