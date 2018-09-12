<!-- =================================================================== -->
<!-- FOOTER START -->
<!-- =================================================================== -->
        <footer class="container-fluid flex-container" id="contact">
            <div class="container">
                <h3><?php the_field('co_heading'); ?></h3>
                <div class="contact flex-container flex--wrap flex--start">
                    <div class="send-mail col-1-2"> 
                        <div class="flex-container flex--column">
                            <?php echo do_shortcode(get_field('cup_short_code', 'options'));?>
                        </div>
                    </div>
                    <div class="contact__details flex-container flex--wrap  col-1-2">
                        <div>
                            <p><i class="icon-mail3 icon-white"></i><?php the_field('co_email_heading'); ?></p>
                            <p><?php the_field('co_email'); ?></p>   
                        </div>
                        <div>
                            <p><i class="icon-phone  icon-white"></i></i><?php the_field('co_phone_heading'); ?></p>
                            <p><?php the_field('co_phone'); ?></p>  
                        </div>
                        <div class="container-fluid">
                            <?php
                            if(get_field('co_google_map')):
                                the_field('co_google_map');
                            endif;    
                            ?>
                        </div>
                    </div>                             
                </div>
                <div class="copyright flex-container">
                    <p>&#x24B8; <?php echo date('Y'); ?></p>
                </div>
            </div>
            <!-- UP BUTTON -->
            <i class="icon-circle-up button-top"></i>
        </footer> 
        <?php
        wp_footer();
        ?>
        <script>
            particlesJS.load('particles-js', '<?php echo get_home_url(); ?>/wp-content/themes/vcs-starter/assets/scripts/particle/particles.json');
        </script>
    </body>
</html>