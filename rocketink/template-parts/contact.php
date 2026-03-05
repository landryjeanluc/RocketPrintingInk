<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        
        <!-- Contact Info Boxes - 4 Horizontal Boxes -->
        <div class="contact-info-boxes">
            <div class="contact-box">
                <div class="contact-box-icon">📍</div>
                <h3>Locations</h3>
                <p><strong>Serving Atlantic Canada</strong></p>
                <p>Fredericton • Moncton • Saint John<br>
                Sussex • Prince Edward Island</p>
            </div>
            
            <div class="contact-box">
                <div class="contact-box-icon">📞</div>
                <h3>Call Us</h3>
                <p><strong>Toll Free:</strong> <a href="tel:+18773807462">1-877-380-7462</a></p>
                <p>Fredericton: <a href="tel:+15064597981">(506) 459-7981</a><br>
                Moncton: <a href="tel:+15068554515">(506) 855-4515</a><br>
                Saint John: <a href="tel:+15066331165">(506) 633-1165</a><br>
                Sussex: <a href="tel:+15064332877">(506) 433-2877</a></p>
            </div>
            
            <div class="contact-box">
                <div class="contact-box-icon">✉️</div>
                <h3>Email Us</h3>
                <p><a href="mailto:rainbow1@nbnet.nb.ca">rainbow1@nbnet.nb.ca</a></p>
            </div>
            
            <div class="contact-box">
                <div class="contact-box-icon">🕐</div>
                <h3>Business Hours</h3>
                <p>Monday - Friday:<br>8:30 AM - 5:00 PM</p>
                <p>Saturday - Sunday: Closed</p>
                <p><small>Available across Atlantic Canada</small></p>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="contact-form">
                <?php if (isset($_GET['quote_sent']) && $_GET['quote_sent'] == 'success'): ?>
                    <div class="form-success-message">
                        <div class="success-icon">✓</div>
                        <h3>Thank You!</h3>
                        <p>Your quote request has been sent successfully. We'll get back to you shortly!</p>
                    </div>
                <?php elseif (isset($_GET['quote_sent']) && $_GET['quote_sent'] == 'error'): ?>
                    <div class="form-error-message">
                        <div class="error-icon">✕</div>
                        <h3>Oops!</h3>
                        <p>There was an error sending your quote request. Please try again or contact us directly.</p>
                    </div>
                <?php endif; ?>
                
                <form class="quote-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="submit_quote_form">
                    <?php wp_nonce_field('quote_form_nonce', 'quote_nonce'); ?>
                    
                    <div class="form-instruction">
                        <p>Please fill out and submit the form below for your free quote.</p>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="first_name">First Name <span class="required">*</span></label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        
                        <div class="form-group form-group-half">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group form-group-half">
                            <label for="mobile">Mobile</label>
                            <input type="tel" id="mobile" name="mobile">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" name="company">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="postal_code">Postal Code / Zip</label>
                        <input type="text" id="postal_code" name="postal_code">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" placeholder="e.g., 500, 1000">
                        </div>
                        
                        <div class="form-group form-group-half">
                            <label for="finished_size">Finished Size</label>
                            <input type="text" id="finished_size" name="finished_size" placeholder="e.g., 8.5x11, 4x6">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="last_order_number">Last Order Number (if applicable)</label>
                            <input type="text" id="last_order_number" name="last_order_number">
                        </div>
                        
                        <div class="form-group form-group-half">
                            <label for="starting_number">Starting Number (if applicable)</label>
                            <input type="text" id="starting_number" name="starting_number">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Select a Service <span class="required">*</span></label>
                        <select id="service" name="service" required>
                            <option value="">-- Please Select --</option>
                            <option value="security">Security Printing</option>
                            <option value="commercial">Commercial Printing</option>
                            <option value="digital">Digital Printing</option>
                            <option value="large-format">Large Format</option>
                            <option value="forms">Forms & NCR</option>
                            <option value="bindery">Bindery Services</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="project_description">Project Description <span class="required">*</span></label>
                        <textarea id="project_description" name="project_description" rows="6" required placeholder="Tell us about your printing project..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="file_upload">Upload Files or Pictures of Item</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="file_upload" name="file_upload[]" multiple accept="image/*,.pdf,.doc,.docx">
                            <p class="file-upload-help">You can upload multiple files (images, PDF, Word documents)</p>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-submit">Send Request</button>
                </form>
        </div>
    </div>
</section>
