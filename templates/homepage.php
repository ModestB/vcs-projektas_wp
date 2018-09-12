<?php

/* Template Name: Homepage Template */

get_header();

?>

<?php
    get_template_part('partials/about');
    get_template_part('partials/hobbies');
    get_template_part('partials/skills');
    get_template_part('partials/resume');
    get_template_part('partials/education');
    get_template_part('partials/quotes');
    get_template_part('partials/work');
    get_template_part('partials/services');
    get_template_part('partials/latest-blog');  
?>

<?php get_footer(); ?>