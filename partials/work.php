        <!-- =================================================================== -->
        <!-- LATEST WORK START -->
        <!-- =================================================================== -->
        <section class="latest-work flex-container flex--column flex--wrap" id="latest-work">
            <div class="container">
                <h2><?php the_field('lw_title'); ?></h2>
                <p><?php the_field('lw_description'); ?></p>
            </div>
            <!-- Latest work cards -->
            <div class="container flex-container flex--wrap latest-work--cards">
                <?php
                $type_of_display = get_field('lw_type_of_display');

                if($type_of_display == 0):
                    $args = array(
                        'posts_per_page'   => get_field('lw_limit'),
                        'category'         => 'Apps',
                        'post_type'        => 'projects'
                    );
                    $projects = get_posts( $args );
                else:
                    $projects = get_field('lw_projects');
                endif;    
            
                if($projects):
                    foreach($projects as $post):
                        setup_postdata($post);
                        ?>
                        <a href="<?php the_permalink(); ?>" class="img-container">
                            <img src="<?php the_post_thumbnail_url('work_image'); ?>" alt="Book">
                            <div class="overlay">
                                <i class="icon-search inner__block"></i>
                            </div>
                        </a>
                        <?php
                    endforeach;
                endif; 
                wp_reset_postdata();   
                ?>
            </div>
            <div class="container view-more flex-container flex--end">
                <a href="<?php echo get_field('lw_button')['url']; ?>" target="<?php echo get_field('lw_button')['target']; ?>"><?php echo get_field('lw_button')['title']; ?><i class="icon-arrow-right2"></i></a>   
            </div>
        </section> <!-- LATEST WORK END-->

