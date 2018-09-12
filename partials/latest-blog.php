        <!-- =================================================================== -->
        <!-- LATEST BLOG START -->
        <!-- =================================================================== -->
        <section class="latest-blog flex-container" id="latest-blog">
            <div class="container flex-container flex--wrap">
                <div class="flex-container flex--wrap ">
                    <div class="card__container card-main"> 
                        <h3><?php the_field('hp_title'); ?></h3>
                        <p><?php the_field('hp_description'); ?></p>
                    </div>
                    <?php
                    $hpid = $post -> ID; 
                    $param = [
                        'cat' => get_field('hp_category'),
                        'posts_per_page' => get_field('hp_limit')
                    ];
                    $result = new WP_Query($param);
                    $button_text = get_field('hp_button_text');

                    if ($result ->  have_posts()):
                        while ($result ->  have_posts()):
                            $result -> the_post(); 
                            ?>
                            <div class="card__container">
                                <div class="card__body flex-container flex--column ">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url('blog_image'); ?>" alt="">
                                    </a>
                                    <div class="card__text">
                                        <a href="<?php the_permalink(); ?>"><h2 class=""><?php  the_title(); ?></h2></a>
                                        <?php  the_content(); ?>
                                    </div>
                                    <div class="flex-container card__subtitle"> 
                                        <p><?php echo get_the_date( 'F j, Y'); ?></p>
                                        <p><?php echo 'by ' . get_the_author_meta('display_name'); ?></p>  
                                    </div>
                                    <div class="card__actionbar flex-container">
                                        <a href='<?php the_permalink(); ?>' class="card__button"><?php echo $button_text; ?></a>
                                    </div>
                                </div>
                            </div> <!-- end of controller-container -->
                            <?php
                        endwhile; // end while
                    endif; // end if
                    wp_reset_postdata();
                    ?>
                </div>
            </div>  
        </section> <!-- LATEST BLOG END-->