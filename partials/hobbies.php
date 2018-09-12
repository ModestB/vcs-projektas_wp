        <!-- =================================================================== -->
        <!-- SECTION HOBBIES START-->
        <!-- =================================================================== -->
        <section class="separation hobbies   container-fluid flex-container">
            <div class="container flex-container flex--wrap">
                <?php
                if(have_rows('hs_hobbies_repeater')):
                    while(have_rows('hs_hobbies_repeater')): the_row();
                        ?>
                        <div class="col-1-4">
                            <i class="<?php the_sub_field('icon'); ?> icon_big"></i>
                            <h4><?php the_sub_field('heading'); ?></h4>
                            <p><?php the_sub_field('description'); ?></p>
                        </div>
                        <?php
                    endwhile;
                endif;       
                ?>
            </div>    
        </section> <!-- Section hobbies end-->