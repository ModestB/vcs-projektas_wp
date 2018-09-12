<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php the_field('ucp_website_title', 'options') ?></title>

        <?php
        //Prijungia stiliaus failus 
        wp_head(); 
        ?>
    </head>
    <body>
        <header>
            <div id="particles-js" class="flex-container flex--column" >
                <div class="container hero">
                    <h1><?php the_field('ucp_message', 'options') ?></h1>
                    <a href="<?php echo get_home_url(); ?>"><?php the_field('ucp_button', 'options') ?></a>
                </div>
            </div>
        </header>
        <?php
        wp_footer();
        ?>
        <script>
            particlesJS.load('particles-js', '<?php echo get_home_url(); ?>/wp-content/themes/vcs-starter/assets/scripts/particle/particles.json');
        </script>
    </body>
</html>