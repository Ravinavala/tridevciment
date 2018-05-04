<?php
/* Template Name: Contact Page Template */
get_header();
?>
<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>

<div id="fullpage">
    <section class="about_section contact">
        <div class="section_header startLogo">
            <div class="logo">
                <?php
                $mainlogo = of_get_option('header_logo');
                if ($mainlogo):
                    ?>
                <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo $mainlogo; ?>" alt="logo image"></a>
                <?php else: ?>
                     <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/tridev-white-logo.svg" alt="logo image"></a>
                <?php endif; ?>
            </div>
            <div class="toggle_button about_toggle">
                <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/toggle_button_black.png" alt="image"></a>
            </div>
        </div>
        <div class="container">
            <h3><?php the_title(); ?></h3>
        </div>
    </section>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?> 

</div>
<?php get_footer(); ?>
