<?php get_header(); ?>

<div id="fullpage">
    <section class="product_detail_section">

        <div class="section_header startLogo">
            <div class="logo">
                <?php
                $mainlogo = of_get_option('header_logo');
                if ($mainlogo):
                    ?>
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo $mainlogo; ?>" alt="logo image"></a>
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/tridev-white-logo.svg" alt="logo image">
                <?php endif; ?>
            </div>
            <div class="toggle_button product_detail_toggle">
                <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/toggle_button_black.png" alt="image"></a>
            </div>
        </div>

        <div class="container">
            <?php if (have_posts()) : ?>
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <div class="product_detail_title">
                        <h3><?php the_title(); ?></h3>
                    </div>                
                    <?php the_content(); ?>
                    <?php
                endwhile;
            endif;
            ?>
        </div>

        <div class="gallery">
            <div class="container">
                <div class="product_detail_page_title gallery_title">
                    <h4>Gallery</h4>    
                </div>



                <?php $getid = get_post_meta($post->ID, '_galleryid', true); ?>


                <?php echo do_shortcode('[PFG id=' . $getid . ']'); ?>


            </div>
        </div>
    </section>
    <section class="get_in_touch section get_in_touch_inner_section" id="section6">
        <div class="container">
            <div class="get_in_touch_heading">
                <h3>Get In Touch</h3>
            </div>
            <div id="contact" class="form get_touch_form">
                <?php echo do_shortcode('[contact-form-7 id="160" title="Get In Touch"]'); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>