<?php
/**
 * Main Template File
 * 
 * @package RocketInk
 * @version 1.0.0
 */

get_header(); ?>

<main id="rocketink-main" class="rocketink-landing-page">
    
    <!-- Hero Section -->
     
    <?php get_template_part('template-parts/hero2'); ?>
   

    <!-- Trust Indicators Bar -->
    <section class="trust-indicators">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item">
                    <span class="trust-icon">✓</span>
                    <h4>40+ Years Experience</h4>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">🇨🇦</span>
                    <h4>100% Canadian Made</h4>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">⚡</span>
                    <h4>Fast Turnaround</h4>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">🏆</span>
                    <h4>Quality Guaranteed</h4>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/services'); ?>
    <?php get_template_part('template-parts/equipment'); ?>
    <?php get_template_part('template-parts/features'); ?>
    <?php get_template_part('template-parts/contact'); ?>
    <?php get_template_part('template-parts/partners'); ?>

</main>

<?php get_footer(); ?>
