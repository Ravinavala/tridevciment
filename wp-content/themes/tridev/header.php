<!DOCTYPE html>
<html>
    <head>
    <head>
        <title><?php
            wp_title('|', true, 'right');
            bloginfo('name');
            ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="icon" href="<?php echo of_get_option('favicon_icon'); ?>" type="image/png">
    </head>
    <?php wp_head(); ?>
    <body <?php body_class(); ?>>
        <div id="preloader">
            <img src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" alt="images" />
            <div id="status">&nbsp;</div>
        </div> 
        <header>
            <?php if (is_front_page()) : ?>
                <nav class="fixed nilesh">
                    <div class="midnightHeader default">
                        <?php
                        $mainlogo = of_get_option('header_logo');
                        if ($mainlogo):
                            ?>
                            <a href="<?php echo site_url(); ?>" class="logo" style="background: url('<?php echo $mainlogo ?>'); background-size: 100% 100%;  background-repeat: no-repeat;"></a>
                        <?php endif; ?>
                        <a href="javascript:void(0)" class="toggle_button"></a>
                    </div>
                    <?php $beforemenulogo = of_get_option('menu_logo'); ?>
                    <div class="midnightHeader white">
                        <a class="logo" style="background: url('<?php echo $beforemenulogo ?>'); background-size: 100% 100%;  background-repeat: no-repeat;"></a>
                        <a href="javascript:void(0)" class="toggle_button"></a>
                    </div>
                    <div class="midnightHeader red">
                        <a class="logo" style="background: url('<?php echo $mainlogo ?>'); background-size: 100% 100%;  background-repeat: no-repeat;"></a>
                        <a href="javascript:void(0)" class="toggle_button"></a>
                    </div>
                </nav>
            <?php endif; ?>
        </header>

        <div class="overlayed_header ">
            <div class="section_header">
                <div class="logo">
                    <?php
                    echo '<a href="' . site_url() . '">';
                    $overlaylogo = of_get_option('menu_logo');
                    if ($overlaylogo):
                        echo '<img src="' . $overlaylogo . '" alt="logo image">';
                    else:
                        echo '<img src=" ' . get_template_directory_uri() . '/images/tridev-white-logo.svg" alt="logo image">';
                    endif;
                    echo '</a>';
                    ?>
                </div>
                <div class="toggle_close">
                    <a href="javascript:void(0)"><img src="<?php echo get_template_directory_uri(); ?>/images/toggle_close.png" alt="image"></a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <nav class="navbar">
                            <div class="header_links">
                                <?php wp_nav_menu(array('theme_location' => 'Header_menu', 'menu' => 'Header Menu')); ?>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        $phone = of_get_option('contact_no');
                        if ($phone):
                            $newphone = str_replace(" ", "", $phone)
                            ?>
                            <div class="contact_info phone">
                                <h6>Phone:</h6>
                                <a href="tel:<?php echo $newphone; ?>"><?php echo $phone; ?></a>
                            </div>
                        <?php endif; ?>
                        <?php
                        $email = of_get_option('email');
                        if ($email):
                            ?>
                            <div class="contact_info mail">
                                <h6>E-mail:</h6>
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </div>
                        <?php endif; ?>
                        <ul class="social_share">
                            <?php
                            $facebook = of_get_option('facebook');
                            $twiter = of_get_option('twitter');
                            $googleplus = of_get_option('google_plus');
                            if ($facebook):
                                echo '<li class = "facebook"><a href ="' . $facebook . '"></a></li>';
                            endif;
                            if ($twiter):
                                echo '<li class="twitter"><a href="' . $twiter . '"></a></li>';
                            endif;
                            if ($googleplus):
                                echo '<li class = "googleplus"><a href = "' . $googleplus . '"></a></li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
