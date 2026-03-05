<?php
/**
 * RocketInk Theme Functions
 * 
 * @package RocketInk
 * @version 1.0.0
 */

// Theme Setup
function rocketink_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height'      => 200,
        'width'       => 800,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'rocketink_setup');

// Enqueue Styles and Scripts
function rocketink_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style('rocketink-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Rocket Landing Page styles
    wp_enqueue_style('rocket-landing', get_template_directory_uri() . '/assets/css/rocket-landing.css', array(), '2.0.0');
    
    // Mobile menu script
    wp_enqueue_script('rocket-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'rocketink_enqueue_assets');

// Custom Logo Output Function
function rocketink_get_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        // Fallback to site name
        echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
    }
}

// Remove admin bar margin
function rocketink_remove_admin_bar_margin() {
    ?>
    <style type="text/css">
        html { margin-top: 0 !important; }
        * html body { margin-top: 0 !important; }
    </style>
    <?php
}
add_action('wp_head', 'rocketink_remove_admin_bar_margin');

// Quote Form Submission Handler
function rocketink_handle_quote_form_submission() {
    // Verify nonce for security
    if (!isset($_POST['quote_nonce']) || !wp_verify_nonce($_POST['quote_nonce'], 'quote_form_nonce')) {
        wp_redirect(add_query_arg('quote_sent', 'error', wp_get_referer()));
        exit;
    }
    
    // Sanitize and collect form data
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $mobile = sanitize_text_field($_POST['mobile']);
    $company = sanitize_text_field($_POST['company']);
    $address = sanitize_textarea_field($_POST['address']);
    $postal_code = sanitize_text_field($_POST['postal_code']);
    $quantity = sanitize_text_field($_POST['quantity']);
    $finished_size = sanitize_text_field($_POST['finished_size']);
    $last_order_number = sanitize_text_field($_POST['last_order_number']);
    $starting_number = sanitize_text_field($_POST['starting_number']);
    $service = sanitize_text_field($_POST['service']);
    $project_description = sanitize_textarea_field($_POST['project_description']);
    
    // Get admin email
    $admin_email = get_option('admin_email');
    
    // Prepare email subject
    $subject = 'New Quote Request from ' . $first_name . ' ' . $last_name;
    
    // Prepare email message
    $message = "You have received a new quote request from your website.\n\n";
    $message .= "===== CONTACT INFORMATION =====\n";
    $message .= "Name: " . $first_name . ' ' . $last_name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Phone: " . $phone . "\n";
    $message .= "Mobile: " . $mobile . "\n";
    $message .= "Company: " . $company . "\n\n";
    
    $message .= "===== ADDRESS =====\n";
    $message .= "Address: " . $address . "\n";
    $message .= "Postal Code/Zip: " . $postal_code . "\n\n";
    
    $message .= "===== PROJECT DETAILS =====\n";
    $message .= "Service: " . $service . "\n";
    $message .= "Quantity: " . $quantity . "\n";
    $message .= "Finished Size: " . $finished_size . "\n";
    $message .= "Last Order Number: " . $last_order_number . "\n";
    $message .= "Starting Number: " . $starting_number . "\n\n";
    
    $message .= "===== PROJECT DESCRIPTION =====\n";
    $message .= $project_description . "\n\n";
    
    // Handle file attachments
    $attachments = array();
    if (isset($_FILES['file_upload']) && !empty($_FILES['file_upload']['name'][0])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        
        $files = $_FILES['file_upload'];
        $upload_overrides = array('test_form' => false);
        
        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array(
                    'name'     => $files['name'][$key],
                    'type'     => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error'    => $files['error'][$key],
                    'size'     => $files['size'][$key]
                );
                
                $movefile = wp_handle_upload($file, $upload_overrides);
                
                if ($movefile && !isset($movefile['error'])) {
                    $attachments[] = $movefile['file'];
                }
            }
        }
        
        if (!empty($attachments)) {
            $message .= "Attached Files: " . count($attachments) . " file(s)\n";
        }
    }
    
    $message .= "\n---\n";
    $message .= "Submitted on: " . date('F j, Y, g:i a') . "\n";
    $message .= "From IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    // Email headers
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>',
        'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($admin_email, $subject, $message, $headers, $attachments);
    
    // Log email attempt for debugging
    error_log('Quote Form Submission: ' . ($sent ? 'SUCCESS' : 'FAILED'));
    error_log('Admin Email: ' . $admin_email);
    error_log('Subject: ' . $subject);
    error_log('From: ' . $first_name . ' ' . $last_name . ' (' . $email . ')');
    
    // Save form submission to database as backup
    $submission_data = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone' => $phone,
        'mobile' => $mobile,
        'company' => $company,
        'address' => $address,
        'postal_code' => $postal_code,
        'quantity' => $quantity,
        'finished_size' => $finished_size,
        'last_order_number' => $last_order_number,
        'starting_number' => $starting_number,
        'service' => $service,
        'project_description' => $project_description,
        'submitted_at' => current_time('mysql'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );
    
    // Store in WordPress options table as a backup
    $submissions = get_option('rocketink_quote_submissions', array());
    $submissions[] = $submission_data;
    update_option('rocketink_quote_submissions', $submissions);
    
    // Clean up uploaded files after sending (optional - keep them or delete them)
    // Uncomment the following lines if you want to delete files after sending
    // foreach ($attachments as $attachment) {
    //     @unlink($attachment);
    // }
    
    // Redirect with success message (showing success even if email fails, since we're storing the data)
    wp_redirect(add_query_arg('quote_sent', 'success', wp_get_referer()));
    exit;
}

// Hook for logged in users
add_action('admin_post_submit_quote_form', 'rocketink_handle_quote_form_submission');

// Hook for non-logged in users
add_action('admin_post_nopriv_submit_quote_form', 'rocketink_handle_quote_form_submission');

// Add admin menu for viewing quote submissions
function rocketink_add_quote_submissions_menu() {
    add_menu_page(
        'Quote Submissions',
        'Quote Submissions',
        'manage_options',
        'quote-submissions',
        'rocketink_display_quote_submissions',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'rocketink_add_quote_submissions_menu');

// Display quote submissions in admin
function rocketink_display_quote_submissions() {
    $submissions = get_option('rocketink_quote_submissions', array());
    $submissions = array_reverse($submissions); // Show newest first
    
    ?>
    <div class="wrap">
        <h1>Quote Submissions</h1>
        <p>All form submissions are stored here as a backup. Email delivery status is logged.</p>
        
        <?php if (empty($submissions)): ?>
            <p><em>No submissions yet.</em></p>
        <?php else: ?>
            <p><strong>Total Submissions:</strong> <?php echo count($submissions); ?></p>
            
            <?php foreach ($submissions as $index => $submission): ?>
                <div style="background: #fff; border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; border-radius: 5px;">
                    <h2 style="margin-top: 0; color: #0073aa;">
                        Submission #<?php echo count($submissions) - $index; ?> - 
                        <?php echo esc_html($submission['first_name'] . ' ' . $submission['last_name']); ?>
                    </h2>
                    
                    <p><strong>Submitted:</strong> <?php echo esc_html($submission['submitted_at']); ?></p>
                    
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd; width: 200px;"><strong>Email:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                <a href="mailto:<?php echo esc_attr($submission['email']); ?>">
                                    <?php echo esc_html($submission['email']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Phone:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['phone']); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Mobile:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['mobile']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Company:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['company']); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Address:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo nl2br(esc_html($submission['address'])); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Postal Code:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['postal_code']); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Service:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['service']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Quantity:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['quantity']); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Finished Size:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['finished_size']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Last Order #:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['last_order_number']); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Starting #:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['starting_number']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd; vertical-align: top;"><strong>Project Description:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo nl2br(esc_html($submission['project_description'])); ?></td>
                        </tr>
                        <tr style="background: #f9f9f9;">
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>IP Address:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($submission['ip_address']); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
}
