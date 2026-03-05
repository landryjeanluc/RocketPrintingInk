/**
 * Navigation & Mobile Menu Script
 * Rocket Printing Landing Page
 */

(function() {
    'use strict';
    
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        
        // Mobile Menu Toggle
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        
        if (menuToggle && navMenu) {
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                this.classList.toggle('active');
                
                // Update aria-expanded attribute
                const isExpanded = navMenu.classList.contains('active');
                this.setAttribute('aria-expanded', isExpanded);
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.main-navigation')) {
                    navMenu.classList.remove('active');
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
        
        // Smooth scroll for anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                
                // Skip if it's just "#"
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    // Close mobile menu if open
                    if (navMenu) {
                        navMenu.classList.remove('active');
                    }
                    if (menuToggle) {
                        menuToggle.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                    }
                    
                    // Calculate offset for sticky nav
                    const navHeight = document.querySelector('.main-navigation')?.offsetHeight || 0;
                    const targetPosition = targetElement.offsetTop - navHeight - 20;
                    
                    // Smooth scroll to target
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Add scroll behavior to body for better support
        document.documentElement.style.scrollBehavior = 'smooth';
        
    });
    
})();
