        <!-- =================================================================== -->
        <!-- EDUCATION START -->
        <!-- =================================================================== -->
        <section class="flex-container flex--column education">
            <div class="container">
                <h3><?php the_field("es_heading"); ?></h3>
            </div>
            <div class="timeline">
                <?php
                if(have_rows('es_timeline_repeater')):
                    $index = 0;
                    while(have_rows('es_timeline_repeater')): the_row();
                        $position = 'left';
                        if($index % 2 != 0):
                            $position = 'right';
                        endif;   

                        $yearFrom = get_sub_field('year_from');
                        $yearTo = get_sub_field('year_to');
                        $year = '';

                        if($yearFrom && $yearTo):
                            $year = $yearFrom . '-' .$yearTo;
                        else: 
                            $year = $yearFrom;
                        endif;    
                        ?>
                        <div class="container-timeline <?php echo $position; ?>">
                            <div class="flex-container year">
                                <h2><?php echo $year; ?></h2>
                            </div>
                            <div class="content">
                                <h4><?php the_sub_field('heading'); ?></h4>
                                <p><?php the_sub_field('short_description'); ?></p>
                            </div>
                        </div>                       
                        <?php
                        $index++;
                    endwhile;
                endif;       
                ?>
            </div>
        </section> <!--EDUCATION END-->