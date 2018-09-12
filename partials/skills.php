        <!-- =================================================================== -->
        <!-- SKILLS STARTS-->
        <!-- =================================================================== -->
        <section class="skills flex-container" id="skills"> 
            <div class="container flex-container flex--wrap">
                <div class="col-1-2">
                    <h3><?php the_field('ss_skills_heading'); ?></h3>
                    <p> <?php the_field('ss_skills_description'); ?> </p>
                </div>
                <div class="col-1-2">
                    <?php
                    if(have_rows('ss_skills_bars_repeater')):
                        while(have_rows('ss_skills_bars_repeater')): the_row();
                            ?>
                            <div class="progress-container">
                                <h4><?php the_sub_field('heading'); ?></h4>
                                <div class="progress">
                                    <div class="progress-bar flex-container flex--end">
                                        <p><?php the_sub_field('skill_level'); ?></p>
                                    </div>
                                </div>
                            </div> 
                            <?php
                        endwhile;
                    endif;       
                    ?>
                </div>
            </div>
        </section> <!-- SKILLS END-->