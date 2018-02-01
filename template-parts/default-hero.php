            <div class="hero text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="heroTitle defaultPages"><?php 
                                if ( !is_archive() ){
                                    $prefix = 'iconillumination';
                                    $alternate_title = get_post_meta(get_the_ID(), $prefix.'hero_text', true);
                                    if ($alternate_title){
                                        echo $alternate_title;
                                    }else{
                                        the_title();
                                    }
                                }else{
                                    echo 'Our projects';
                                }
                                ?></h1>
                        </div>
                    </div>
                </div>
            </div>