<?php
/**
 * Main Template File - Rocket Printing Landing Page
 * 
 * @package RocketInk
 * @version 2.0.0
 */

get_header(); ?>

<main id="main-content" class="rocket-landing-page">
    
    <?php get_template_part('template-parts/hero-rocket'); ?>
    
    <?php get_template_part('template-parts/products-grid'); ?>
    
    <?php get_template_part('template-parts/services-banner'); ?>
    
    <?php get_template_part('template-parts/why-choose'); ?>
    
    <?php get_template_part('template-parts/contact-bar'); ?>

</main>

<?php get_footer(); ?>
