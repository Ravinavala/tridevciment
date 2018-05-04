<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>

<div class="section_header startLogo">
    <?php
    $mainlogo = of_get_option('header_logo');
    if ($mainlogo):
        ?>
        <div class="logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo $mainlogo; ?>" alt="logo image"></a>
        </div>
        <div class="toggle_button about_toggle">
            <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/toggle_button.png" alt="image"></a>
        </div>
    <?php endif; ?>
</div>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <p><?php the_content(); ?></p>
        <?php
    endwhile;
endif;
?> 
<?php
get_footer();
