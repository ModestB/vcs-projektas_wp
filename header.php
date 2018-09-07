<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_field('wo_title', 'options') ?></title>

    <?php
       //Prijungia stiliaus failus 
       wp_head(); 
    ?>
</head>
<body>
    <!-- ======================================================================= -->
    <!-- LANDING PAGE + NAV -->
    <!-- ======================================================================= -->

    <header>
        <div id="particles-js" class="flex-container flex--column" >
            <div class="flex-container">
                <div class="container-fluid flex-container sticky" id="header">
                    <div class="container">
                        <div class="flex-container flex--end">
                            <button class="hamburger hamburger--spin" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <nav>

                                <ul>
                                    <?php
                                    $args = [
                                        "menu_class" => "",
                                        "container" => false,
                                        "theme_location" => 'primary-navigation',
                                        "walker" => new Walker_Menu_With_Icons()
                                    ];
                                    wp_nav_menu($args);
                                 ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container hero">
                <h1><?php the_field('lp_heading', 'options');?></h1> 
                <h2><?php the_field('lp_welcome', 'options');?></h2>

                <?php $link = get_field('lp_button_link', 'options');?>
                <a href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
            </div>
        </div>
    </header>