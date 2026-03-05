<?php
/**
 * Template Name: Home Landing Page
 * Template Post Type: page
 *
 * Used for the main landing page. Assign this template to a WordPress Page,
 * then set that page as the Static Front Page under Settings > Reading.
 * SEO plugins (Yoast, RankMath, etc.) will then be able to edit the title,
 * meta description, and other SEO fields directly on that page in the admin.
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
