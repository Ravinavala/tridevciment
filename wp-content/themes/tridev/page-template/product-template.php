<?php
/* Template Name: our product Page Template */
get_header();
?>
<div id="fullpage">
    <section class="our_products section our_product_section" id="section10">
        <div class="section_header startLogo">
            <div class="logo products_logo">
                <a href="<?php echo site_url(); ?>">
                    <?php
                    $otherpagelogo = of_get_option('otherpage_logo');
                    if ($otherpagelogo):
                        ?>
                        <img src="<?php echo $otherpagelogo; ?>" alt="logo image">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tridev-white-logo.svg" alt="logo image">
                    <?php endif; ?>
                </a>
            </div>
            <div class="toggle_button products_toggle">
                <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/toggle_button_black.png" alt="image"></a>
            </div>
        </div>
        <div class="our_products_tab">
            <div class="section_title">
                <div class="container">
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
            <div id="responsiveTabs3">
                <ul class="products_catagories">
                    <?php
                    $our_product = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                        'order' => 'ASC'
                    );
                    $productloop = new WP_Query($our_product);
                    $count = 0;
                    if ($productloop->have_posts()):

                        while ($productloop->have_posts()): $productloop->the_post();
                            $count++;
                            $featuredimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
                            ?>
                            <li class="compound_wall"><a href="#tab-<?php echo $count; ?>" style="background: url('<?php echo $featuredimg; ?>'); background-position: 50% 50%;  background-repeat: no-repeat;"></a></li>
                            <?php
                            wp_reset_postdata();
                        endwhile;
                    endif;
                    ?>
                </ul>

                <?php
                $product_detail = array(
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                    'order' => 'ASC'
                );
                $productdetailloop = new WP_Query($product_detail);
                $i = 0;
                if ($productdetailloop->have_posts()):

                    while ($productdetailloop->have_posts()): $productdetailloop->the_post();
                        $i++;
                        $id = get_the_ID();
                        //$gallery = get_gallery($id);
                        ?>

                        <div id="tab-<?php echo $i; ?>">
                            <div class="tab-content">
                                <div class="tab_heading">
                                    <a href="<?php echo get_the_title(); ?>"><?php the_title(); ?> </a>
                                </div>
                                <div class="view_more">
                                    <a href="<?php echo get_permalink(); ?>">View More</a>
                                </div>
                                <div class="product_slider">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <?php
                                            $slide = get_post_meta($id, '_galleryid', true);
                                            if ($slide):
                                                $allimages = array('p' => $slide, 'post_type' => 'awl_filter_gallery', 'orderby' => 'ASC');
                                                $loop = new WP_Query($allimages);
                                                while ($loop->have_posts()) : $loop->the_post();
                                                    $post_id = get_the_ID();

                                                    $all_category = get_option('awl_portfolio_filter_gallery_categories');
                                                    $pf_gallery_settings = unserialize(base64_decode(get_post_meta($post_id, 'awl_filter_gallery' . $post_id, true)));
                                                    $pf_gallery_id = $post_id;
                                                    // collect all selected filters assigned on images
                                                    for ($ia = 0; $ia < count($pf_gallery_settings['image-ids']); $ia++) {
                                                        $attachment_id = $pf_gallery_settings['image-ids'][$ia];
                                                        $thumb = wp_get_attachment_image_src($attachment_id, 'thumb', true);
                                                        $thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail', true);
                                                        $full = wp_get_attachment_image_src($attachment_id, 'full', true);
                                                        $postthumbnail = wp_get_attachment_image_src($attachment_id, 'post-thumbnail', true);
                                                        //set thumbnail size

                                                        echo '<li>
                                                <img src="' . $thumb[0] . '" alt="slider_img" class="img-responsive "/>
                                                <a class="fancybox" href="' . $full[0] . '" data-fancybox="gallery1"> <span class="flex-caption "><img src="' . get_template_directory_uri() . '/images/zoomin_flexscaption.png" alt="zoomin"/> </span></a>
                                            </li>';
                                                    }

                                                endwhile;
                                            endif;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                endif;
                ?>

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
