<?php
    $prefix = 'iconillumination';
    $our_title = get_post_meta(get_the_ID(), $prefix.'out_company_title', true);
    $our_content = get_post_meta(get_the_ID(), $prefix.'out_company_content', true);
    $team_title = get_post_meta(get_the_ID(), $prefix.'out_team_title', true);
    $team_content = get_post_meta(get_the_ID(), $prefix.'out_team_content', true);
    $about_quote = get_post_meta(get_the_ID(), $prefix.'about_quote_string', true);
    $about_quote_author = get_post_meta(get_the_ID(), $prefix.'about_author_quote_string', true);
?>
            <section id="ramdom_page_content" class="randomPagecontent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2 class="isHeading services"><?php echo $our_title; ?></h2>
                            <?php if (!empty ($our_content)){ ?>
                            <p class="homeServiceDescription"><?php echo $our_content; ?></p>
                            <?php }else{ ?>
                            <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                            <?php } ?>
                            <hr />
                            <div class="text-center">
                            <?php if (!empty ($about_quote)){ ?>
                            <p class="quoteMessage"><?php echo $about_quote; ?></p>
                            <?php }else{ ?>
                            <p class="quoteMessage">Please add the copy text in Home page editor window.</p>
                            <?php } ?>
                            <span class="quoteSeparator"></span>
                            <?php if (!empty ($about_quote_author)){ ?>
                            <span class="quoteAuthor likeLink"><?php echo $about_quote_author; ?></span>
                            <?php }else{ ?>
                            <p class="quoteAuthor likeLink">Please add the copy text in Home page editor window.</p>
                            <?php } ?>
                            </div>
                            <hr />
                            <h2 class="isHeading services"><?php echo $team_title; ?></h2>
                            <?php if (!empty ($team_content)){ ?>
                            <p class="homeServiceDescription"><?php echo $team_content; ?></p>
                            <?php }else{ ?>
                            <p class="homeServiceDescription">Please add the copy text in Home page editor window.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>