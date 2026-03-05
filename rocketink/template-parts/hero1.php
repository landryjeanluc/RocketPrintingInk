 <section class="rocketink-hero">
        <div class="hero-content">
            <div class="hero-text">
                <div class="site-logo-wrapper">
                    <?php rocketink_get_logo(); ?>
                </div>
                
                <!-- Rocket Printing Closure Notification -->
                <div id="rocket-closure-banner" class="notification-banner-hero" style="display: none;">
                    <div class="notification-container-hero">
                        <div class="notification-content-hero">
                            <div class="notification-icon-hero">📢</div>
                            <div class="notification-text-hero">
                                <h3 class="notification-title-hero">Important Notice: Rocket Printing Has Closed</h3>
                                <div class="notification-body-hero">
                                    <div class="notification-box-hero notification-main-message-hero">
                                        <p><strong>We're sorry to share that Rocket Printing, formerly Taylor Printing Group, has closed.</strong></p>
                                        <p>After many years of serving the community, Rocket Printing has permanently closed its doors. We know this may disrupt your regular printing routine, and we want to make the transition as smooth as possible.</p>
                                    </div>
                                    
                                    <div class="notification-box-hero notification-services-hero">
                                        <p><strong>Rainbow Printing is working with Rocket Printing's former clients</strong> that have reached out to us and with their ongoing projects. We offer a full range of services including: <strong>Commercial, Digital, Security, and Direct Mail with Canada Post.</strong></p>
                                        
                                        <p>With one of the largest Offset and Digital presses in New Brunswick and over <strong>40 years of experience</strong> serving Fredericton and Atlantic Canada, our knowledgeable team is ready to assist with all your printing and mailing needs.</p>
                                    </div>
                                    
                                    <div class="notification-contact-hero">
                                        <p><strong>Feel free to reach out as we're here to ensure your printing continues seamlessly. You can contact us by:</strong></p>
                                        <ol>
                                            <li>Requesting a free quote using our form below.</li>
                                            <li>Calling Fredericton at <a href="tel:506-459-7981">506-459-7981</a> or <a href="tel:1-877-389-7462">1-877-389-7462</a>.</li>
                                            <li>Emailing us at <a href="mailto:rainbow1@nbnet.nb.ca">rainbow1@nbnet.nb.ca</a> or visiting <a href="http://www.rainbowprinting.ca" target="_blank">www.rainbowprinting.ca</a>.</li>
                                        </ol>
                                    </div>
                                    
                                    <div class="notification-highlight-hero">
                                        <strong>⭐ Special Offer:</strong> Please mention that you were a customer of Rocket Printing, so we can review any previous specs and recommend the closest possible match for your design. <strong>You will also receive a discount for set up fees.</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="dismiss-notification-hero" class="notification-dismiss-hero" aria-label="Dismiss notification">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>

                <script>
                (function() {
                    'use strict';
                    
                    // Check if the banner has been dismissed
                    const bannerDismissed = localStorage.getItem('rocketClosureBannerDismissed');
                    const banner = document.getElementById('rocket-closure-banner');
                    const dismissBtn = document.getElementById('dismiss-notification-hero');
                    
                    // Show banner if not dismissed
                    if (!bannerDismissed && banner) {
                        banner.style.display = 'block';
                    }
                    
                    // Handle dismiss button click
                    if (dismissBtn) {
                        dismissBtn.addEventListener('click', function() {
                            banner.style.display = 'none';
                            localStorage.setItem('rocketClosureBannerDismissed', 'true');
                        });
                    }
                })();
                </script>
                
                <p class="hero-tagline">Your Complete Printing Partner</p>
                <p class="hero-description">Professional commercial, security, and digital printing services serving Atlantic Canada for over 40 years.</p>
                <div class="hero-cta">
                    <a href="#contact" class="btn btn-primary">Get a Free Quote</a>
                    <a href="#services" class="btn btn-secondary">Our Services</a>
                </div>
            </div>
            <div class="hero-badges-container">
                <div class="hero-security-badge">
                    <div class="security-feature">
                        <span class="badge-icon">🔒</span>
                        <h3>Licensed & Secure</h3>
                        <p>Atlantic Canada's Only Licensed Cheque Printer</p>
                    </div>
                </div>
                <div class="hero-security-badge hero-rainbow-badge">
                    <div class="security-feature">
                        <a href="https://www.rainbowprinting.ca" target="_blank" rel="noopener" class="hero-rainbow-logo-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logos/rainbow-printing-logo.png" alt="Rainbow Printing" class="hero-rainbow-logo">
                        </a>
                        <p>Visit <a href="https://www.rainbowprinting.ca" target="_blank" rel="noopener" class="hero-link">RainbowPrinting.ca</a> for complete services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>