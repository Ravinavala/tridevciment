<?php
/* Template Name: Home Page Template12 */
get_header();
?>


<div id="fullpage">
    <section class="banner_video_section">
        <video loop="" muted="" autoplay="" id="MY_VIDEO_1" class="video-js vjs-default-skin fullscreen_bg__video" preload="auto" poster="<?php echo get_template_directory_uri(); ?>/images/tridev-image.jpg">
            <?php $uploadedvideo = of_get_option('video_file');
            ?>
            <source src="<?php echo $uploadedvideo; ?>" type="video/mp4">
            <source src="<?php echo $uploadedvideo; ?>" type="video/ogg">
            <source src="<?php echo $uploadedvideo; ?>" type="video/webm">
        </video>
    </section>


    <section class="our_products section" data-midnight="white">
        <div class="our_products_tab">

            <div class="section_title">
                <div class="container">
                    <h3>our Products</h3>
                </div>
            </div>
            <div id="responsiveTabs1">


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
                            <li class="rooms"><a href="#tab-<?php echo $count; ?>" style="background: url('<?php echo $featuredimg; ?>'); background-position: 50% 50%;  background-repeat: no-repeat;"></a></li>
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
//                                            foreach ($gallery as $gallerys) {
//                                                echo '<li>
//                                                <img src="' . $gallerys->thumb_url . '" alt="slider_img" class="img-responsive "/>
//                                                <a class="fancybox" href="' . $gallerys->large_url . '" data-fancybox="gallery1"> <span class="flex-caption "><img src="' . get_template_directory_uri() . '/images/zoomin_flexscaption.png" alt="zoomin"/> </span></a>
//                                            </li>';
//                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        wp_reset_postdata();
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </section>


    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <p><?php the_content(); ?></p>
            <?php
        endwhile;
    endif;
    ?>

</div>
<?php
echo '<section class="our_projects section" data-midnight="red">
                <div class="our_project_tab">
                    <div id="responsiveTabs2">
                        <div class="project_heading">
                            <h3>Our Projects</h3>
                        </div>
                       
                       <ul class="r-tabs-nav">';

$product_detail = array(
    'post_type' => 'project',
    'posts_per_page' => 6,
    'order' => 'ASC'
);
$productdetailloop = new WP_Query($product_detail);
$i = 10;
$ids = array();
$min = 0;
if ($productdetailloop->have_posts()):
    while ($productdetailloop->have_posts()): $productdetailloop->the_post();
        $min++;
        $i++;
        $id = get_the_ID();
        $ids[] = $id;
        $gallery = get_gallery($id);
        echo '<li class="r-tabs-tab r-tabs-state-default" data-min="' . $min . '"><a href = "#tab-' . $i . '" class="r-tabs-anchor">' . get_the_title() . '</a></li>';
    endwhile;
endif;
echo '</ul>';
// $arrlength = count($ids);
$args = array(
    'post_type' => 'project',
    'posts_per_page' => 6,
    'order' => 'ASC'
);
$pcnt = 10;
$map = 0;
$project = new WP_Query($product_detail);
$locations = array();
if ($productdetailloop->have_posts()):
    while ($productdetailloop->have_posts()): $productdetailloop->the_post();
        $pcnt++;
        $map++;
        $mpimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
        $loop = CFS()->get('map_location');
        foreach ($loop as $row) {
            $address = $row['location'];
            $latLong = getLatLong($address);
            $latitude = $latLong['latitude'] ? $latLong['latitude'] : '';
            $longitude = $latLong['longitude'] ? $latLong['longitude'] : '';
            echo '<input type = "hidden" class = "mapdata_' . $map . '" data-location="' . $address . '" data-img="' . $mpimg . '" data-lat="' . $latitude . '" data-longitude="' . $longitude . '"/>';
        }
        echo '<div id = "tab-' . $pcnt . '">
         <div class="map_id' . $map . '" id="map' . $map . '" >';
        echo '<input type = "hidden" class = "mapimg" value = "' . $mpimg . '" />';
        '</div>';

        echo '
          </div>';
    endwhile;
endif;
echo '<div id = "output"></div>
    </div>
    </div>
    </section>';
echo $out;
?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMMWZaendVs4dQqffMFny74f0kDnF0rig"></script>

<script type="text/javascript">
    debugger;
    var map;
    var marker;
    var mapimg = jQuery('.mapimg').val();
    var myLatlng = new google.maps.LatLng(22.3369508, 73.1900702);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize12() {
        var mapOptions = {
            zoom: 8,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map1"), mapOptions);
        var icons = {
            roomes: {
                icon: mapimg
            }
        };

        var features = [
<?php
if ($productdetailloop->have_posts()):
    while ($productdetailloop->have_posts()): $productdetailloop->the_post();

        $mpimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
        $loop = CFS()->get('map_location');

        foreach ($loop as $row) {
            $address = $row['location'];
            $latLong = getLatLong($address);
            $latitude = $latLong['latitude'] ? $latLong['latitude'] : '';
            $longitude = $latLong['longitude'] ? $latLong['longitude'] : '';
            if ($latitude && $longitude):
                ?>
                            {myLatlng: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                                type: 'roomes',
                            },
                <?php
            endif;
        }
    endwhile;
endif;
?>
        ];

        features.forEach(function (feature) {
            var marker = new google.maps.Marker({
                map: map,
                position: feature.myLatlng,
                icon: icons[feature.type].icon,
                draggable: false
                        // label: {
                        //     color: 'white',
                        //     fontWeight: 'bold',
                        //     text: 'Hello world',
                        // } 
            });
        });
        geocoder.geocode({'latLng': myLatlng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#latitude,#longitude').show();
                    $('#address').val(results[0].formatted_address);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });
        google.maps.event.addListener(marker, 'dragend', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#address').val(results[0].formatted_address);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize12);
//    jQuery('#responsiveTabs2').responsiveTabs({
//
//    });

    jQuery('.r-tabs-nav  .r-tabs-state-default').click(function (e) {
        debugger;
        jQuery(this).attr('data-min');
        var datamin = jQuery(this).attr('data-min');
        alert(datamin);
        var map;
        var marker;

        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();

        function initialize() {

            var mapOptions = {
                zoom: 8,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            markers = [];
            map = new google.maps.Map(document.getElementById("map" + datamin), mapOptions);
            jQuery('.mapdata_' + datamin).each(function (i) {
                var lat = jQuery(this).attr('data-lat');
                var lng = jQuery(this).attr('data-longitude');
                var mapimg = jQuery(this).attr('data-img');
                var myLatlng = new google.maps.LatLng(22.3369508, 73.1900702);
                if (lat != '' && lng != '') {

                    var latlng = new google.maps.LatLng(lat, lng);
                    alert(latlng);
                    var image = {
                        url: mapimg,
                        labelOrigin: new google.maps.Point(17, 15)
                    }

                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        animation: google.maps.Animation.DROP,
                        icon: mapimg
                    });

                    markers.push(marker);
                    var contentString = '<div class="map_popup1">infowindow</div>';
                    var datalocation = jQuery(this).attr('data-location');
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        maxWidth: 233
                    });
                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.close();
                        infowindow.setContent('<div class="infowindow"><p><b>' + datalocation + '</b></p><a href="' + datalocation + '"">Details</a></div>');
                        infowindow.open(map, this);

                    });

                }
            });
            geocoder.geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#latitude,#longitude').show();
                        $('#address').val(results[0].formatted_address);
                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
//            google.maps.event.addListener(marker, 'dragend', function () {
//                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
//                    if (status == google.maps.GeocoderStatus.OK) {
//                        if (results[0]) {
//                            $('#address').val(results[0].formatted_address);
//                            $('#latitude').val(marker.getPosition().lat());
//                            $('#longitude').val(marker.getPosition().lng());
//                            infowindow.setContent(results[0].formatted_address);
//                            infowindow.open(map, marker);
//                        }
//                    }
//                });
//            });
        }
        google.maps.event.addDomListener(document, 'click', initialize);
    });


</script> 

<?php get_footer(); ?>
