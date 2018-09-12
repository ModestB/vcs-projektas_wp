        <!-- =================================================================== -->
        <!-- ABOUT ME START -->
        <!-- =================================================================== -->
        <section class="flex-container flex--column about" id="about-me">
            <div class="container flex-container flex--wrap">
                <div class="col-1-2">
                    <h3><?php the_field('am_heading'); ?></h3>
                    <p><?php echo wp_strip_all_tags(get_field('am_description')); ?></p>
                    <p><?php the_field('am_social_description'); ?>
                        <?php
                        if(have_rows('am_sm_links_repeater')):
                            while(have_rows('am_sm_links_repeater')): the_row();
                                $link = get_sub_field('link');
                                if($link['target'] == "_blank"){
                                    $link['target'] = 'target = "_blank"';
                                } else {
                                    $link['target'] = '';
                                };
                                ?>
                                <a href="<?php echo $link['url']; ?>" <?php echo $link['target']; ?>><i class="<?php the_sub_field('icon'); ?>"></i></a>
                                <?php
                            endwhile;
                        endif;       
                        ?>
                    </p>
                </div>
                <div class="col-1-2">
                    <div class="self-img">
                        <img src="<?php echo  get_field('profile_photo')['sizes']['profile_image']; ?>" alt="<?php echo get_field('profile_photo')['alt']; ?>">
                    </div>
                </div>
            </div>
        </section> <!-- ABOUT ME END-->