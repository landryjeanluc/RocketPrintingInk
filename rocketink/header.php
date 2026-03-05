<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'rocketink'); ?></a>
    
    <!-- Top Navigation Bar (Black) -->
    <div class="top-nav-bar">
        <div class="top-nav-container">
            <div class="top-nav-right">
                <a href="mailto:rainbow1@nbnet.nb.ca" class="top-nav-link">
                    <span class="icon">✉</span> rainbow1@nbnet.nb.ca
                </a>
                <a href="tel:1-877-380-7462" class="top-nav-link">
                    <span class="icon">📞</span> 1-877-380-7462
                </a>
                <a href="https://www.rainbowprinting.ca/order-online/" class="top-nav-link">
                    <span class="icon">📋</span> ORDER ONLINE
                </a>
                <a href="https://www.rainbowprinting.ca/upload-files/" class="top-nav-link">
                    <span class="icon">📁</span> UPLOAD A FILE
                </a>
                <a href="https://rainbowprinting.ca/get-a-quote/" class="top-nav-link">
                    <span class="icon">💬</span> GET A QUOTE
                </a>
                <a href="https://www.rainbowprinting.ca/cart/" class="top-nav-link top-nav-cart">
                    <span class="icon">🛒</span> CART
                </a>
            </div>
        </div>
    </div>
    
    <!-- Secondary Navigation (White) -->
    <nav class="main-navigation">
        <div class="nav-container">
            <a href="https://www.rainbowprinting.ca" class="nav-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logos/rainbow-printing-logo.png" alt="Rainbow Printing" class="rainbow-logo-nav">
            </a>
            <button class="mobile-menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu">
                <li><a href="https://www.rainbowprinting.ca/about/">ABOUT</a></li>
                <li><a href="https://www.rainbowprinting.ca/commercial-printing/">COMMERCIAL PRINTING</a></li>
                <li><a href="https://www.rainbowprinting.ca/security-printing/">SECURITY PRINTING</a></li>
                <li><a href="https://www.rainbowprinting.ca/faqs/">FAQS</a></li>
                <li><a href="https://www.rainbowprinting.ca/contact/">CONTACT US</a></li>
                <li><a href="https://www.rainbowprinting.ca/get-started/">GET STARTED</a></li>
                <li><a href="https://www.rainbowprinting.ca/commercial-printing/business-forms/" class="highlight">ORDER FORMS</a></li>
            </ul>
        </div>
    </nav>
