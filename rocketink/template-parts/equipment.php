<!-- Equipment Showcase -->
<section class="equipment-showcase">
    <div class="container">
        <h2 class="section-title">State-of-the-Art Equipment</h2>
        <p class="section-subtitle">One of the largest offset and digital presses in New Brunswick</p>
        <div class="equipment-grid">
            <?php
            // Get equipment images from the folder
            $equipment_dir = get_template_directory() . '/images/equipment/';
            $equipment_url = get_template_directory_uri() . '/images/equipment/';
            
            if (is_dir($equipment_dir)) {
                $images = glob($equipment_dir . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                
                if (!empty($images)) {
                    // Display actual images
                    foreach ($images as $image_path) {
                        $filename = basename($image_path);
                        $image_url = $equipment_url . $filename;
                        $alt_text = ucwords(str_replace(['-', '_', '.jpg', '.jpeg', '.png', '.gif', '.webp'], ' ', pathinfo($filename, PATHINFO_FILENAME)));
                        ?>
                        <div class="equipment-item">
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="<?php echo esc_attr($alt_text); ?>" 
                                 loading="lazy">
                        </div>
                        <?php
                    }
                } else {
                    // Show placeholders if no images found
                    ?>
                    <div class="equipment-item"><div class="equipment-image-placeholder"><p>🖨️ Professional Offset Presses</p></div></div>
                    <div class="equipment-item"><div class="equipment-image-placeholder"><p>🎨 Advanced Color Matching</p></div></div>
                    <div class="equipment-item"><div class="equipment-image-placeholder"><p>⚡ High-Speed Digital Press</p></div></div>
                    <div class="equipment-item"><div class="equipment-image-placeholder"><p>🔧 Professional Finishing</p></div></div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
