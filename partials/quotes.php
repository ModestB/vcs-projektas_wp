        <!-- =================================================================== -->
        <!-- QUOTES SEPARATION -->
        <!-- =================================================================== -->
        <section class="separation separation-quotes  container-fluid flex-container">
            <div class="container">
                <div class= "swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if(have_rows('qs_quote')):
                            while(have_rows('qs_quote')): the_row();
                                ?>
                                <div class="swiper-slide flex-container">
                                    <div class="flex-container ">
                                        <div class="col-1-4  flex-container flex--column slide-img">
                                            <img src="<?php echo get_sub_field('photo')['sizes']['thumbnail']; ?>" 
                                                alt="<?php echo get_sub_field('photo')['alt']; ?>">
                                            <p><?php the_sub_field('name'); ?></p>
                                        </div>
                                        <div class="col-3-5 slide-qoute">
                                            <blockquote>
                                                <p><?php the_sub_field('quote'); ?></p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;       
                        ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-black"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-black"></div>
                    <div class="swiper-button-prev swiper-button-black"></div>
                </div>
            </div>
        </section>  <!-- QUOTES SEPARATION END-->