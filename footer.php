
    <!-- =================================================================== -->
    <!-- FOOTER START -->
    <!-- =================================================================== -->
    <footer class="container-fluid flex-container" id="contact">
        <div class="container">
            <h3>Contact</h3>
            <div class="contact flex-container flex--wrap flex--start">
                <!-- Start of Send mail form-->
                <div class="send-mail col-1-2"> 
                    <!-- <form action="mailto:Mbujanauskas@gmail.com" method='post' enctype="text/plain"> -->
                        <div class="flex-container flex--column">
                        <?php echo do_shortcode(get_field('cup_short_code'))?>
                            <!-- <label for="name">Your name </label>
                            <input type="text" id="name" placeholder="Enter your name">
                            <label for="email">Email </label>
                            <input type="text" id="email" placeholder="Enter your email">
                            <label for="email">Subject</label>
                            <input type="text" id="subject" placeholder="Enter message subject">
                            <label for="email-text">Message </label>
                            <textarea name="email-text" id="email-text" placeholder="Enter your message"></textarea>
                            <button type="submit" class="flex-container">Send <i class="icon-arrow-right2"></i></button> -->
                        </div>
                    <!-- </form> -->
                </div> 
               
                <div class="contact__details flex-container flex--wrap col-1-2">
                    <div>
                        <p><i class="icon-mail3 icon-white"></i> E-maill address</p>
                        <p><?php the_field('fo_email', 'options') ?></p>   
                    </div>
                    <div>
                        <p><i class="icon-phone  icon-white"></i> Phone</p>
                        <p><?php the_field('fo_phone', 'options') ?></p>  
                    </div>
                </div>
            </div> <!--END of contact-->
            
            <div class="copyright flex-container">
                <p>&#x24B8; 2018</p>
            </div>
        </div>
    </footer> 

    <?php
        wp_footer();
    ?>
</body>
</html>