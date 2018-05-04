<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 media ">
                    <div class="media-body factory ">
                        <h4 class="media-heading">Factory:</h4>
                        <address>N.H.No.8, Vasad-388306, Dist. Anand, Gujarat, INDIA Ph.:+912692-284501</address>
                    </div>
                </div>
                <div class="col-sm-4 media">
                    <?php
                    $email = of_get_option('email');
                    if ($email):
                        ?>
                        <div class="media-body  email">
                            <h4 class="media-heading">E-mail:</h4>
                            <a  href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3 media">
                    <?php
                    $phone = of_get_option('contact_no');
                    if ($phone):
                        $newphone = str_replace(" ", "", $phone)
                        ?>
                        <div class=" media-body phone">
                            <h4 class="media-heading">Phone:</h4>
                            <a href="tel:<?php echo $newphone; ?>"><?php echo $phone; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="col-sm-4 ">
                <?php
                $link = of_get_option('powerby_url');
                $ptext = of_get_option('powerby_text');
                if ($ptext):
                    ?>
                    <div class="footer_text_left">
                        <p>Powered by <a href="<?php echo $link; ?>" target="_blank"><?php echo $ptext; ?></a></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="copyright_text">
                <p><?php echo of_get_option('copyright_text'); ?></p>
            </div>
        </div>
    </div>
</footer>
</section>
</div>

<?php wp_footer(); ?>
</body>
</html>
