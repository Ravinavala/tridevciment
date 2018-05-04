<?php get_header(); ?>

<div id="fullpage">
    <section class="product_detail_section">

        <div class="section_header startLogo">
            <div class="logo">
                <a href="index.html"><img src="images/tridev-color-logo.svg" alt="logo image"></a>
            </div>
            <div class="toggle_button product_detail_toggle">
                <a href="javascript:void(0)"><img src="images/toggle_button_black.png" alt="image"></a>
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
                <div class="all_product button-group filter-button-group">
                    <button class="button is-checked" data-filter="*">All</button>
                </div>
                <div class="row">
                    <div class="grid" style="position: relative; height: 1092px;">

                        <div class="col-sm-3 grid-item" style="position: absolute; left: 0px; top: 0px;">
                            <div class="divider_img">
                                <img src="product_images/precast/precast_wall_1.jpg" alt="" class="img-responsive">
                                <div class="background_set">
                                    <a href="product_images/precast/precast_wall_1.jpg" data-fancybox="gallery" class="search_icon fancybox"><img src="images/search_icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>    
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