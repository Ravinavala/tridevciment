<?php
/* Template Name: Home Page Template */
get_header();
?>


<div id="fullpage">
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMMWZaendVs4dQqffMFny74f0kDnF0rig"></script>

<script type="text/javascript">

    var map;
    var marker;
    var mapimg = jQuery('.mapimg').val();

    function initialize1() {
        var add = jQuery('.mapdata_1').attr('data-add');
        var input = document.getElementById(add);
        if (input != '') {
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                alert(place);
            });
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize1);



    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var init_lat = jQuery('.mapdata_1').attr('data-lat');
    var init_log = jQuery('.mapdata_1').attr('data-longitude');
    if (init_lat != "" && init_log != "") {
        var myLatlng = new google.maps.LatLng(init_lat, init_log);
    } else {
        var myLatlng = new google.maps.LatLng(22.3369508, 73.1900702);
    }
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

        jQuery(".mapdata_1").each(function () {
            var lat = jQuery(this).attr('data-lat');
            var lng = jQuery(this).attr('data-longitude');
            var mapimgs = jQuery(this).attr('data-img');
            var address = jQuery(this).attr('data-add');
            var latlng = new google.maps.LatLng(lat, lng);

            var image = {
                url: mapimgs,
                labelOrigin: new google.maps.Point(17, 15)
            }

            var contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
                    '<div id="bodyContent">' + address +
                    '</div>' +
                    '</div>';

            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: mapimgs
            });

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 233
            });
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.close();
                infowindow.setContent('<div class="infowindow">' + address + '</div>');
                infowindow.open(map, this);

            });

        });


    }
    google.maps.event.addDomListener(window, 'load', initialize12);
    //    jQuery('#responsiveTabs2').responsiveTabs({
    //
    //    });

    jQuery('.r-tabs-nav  .r-tabs-state-default').click(function (e) {

        var datamin = jQuery(this).attr('data-min');
        var map;
        var marker;
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        var init_lat = jQuery('.mapdata_' + datamin).attr('data-lat');
        var init_log = jQuery('.mapdata_' + datamin).attr('data-longitude');
        if (init_lat != "" && init_log != "") {
            var myLatlng = new google.maps.LatLng(init_lat, init_log);
        } else {
            var myLatlng = new google.maps.LatLng(22.3369508, 73.1900702);
        }

        var mapOptions = {
            zoom: 8,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map" + datamin), mapOptions);
        jQuery('.mapdata_' + datamin).each(function (i) {
            var lat = jQuery(this).attr('data-lat');
            var lng = jQuery(this).attr('data-longitude');
            var mapimgs = jQuery(this).attr('data-img');
            var address = jQuery(this).attr('data-add');

            if (lat != '' && lng != '') {
                var latlng = new google.maps.LatLng(lat, lng);

                var image = {
                    url: mapimgs,
                    labelOrigin: new google.maps.Point(17, 15)
                }


                var contentString = '<div id="content">' +
                        '<div id="siteNotice">' +
                        '</div>' +
                        '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
                        '<div id="bodyContent">' + address +
                        '</div>' +
                        '</div>';

                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: mapimgs,
                });

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 233
                });


                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.close();
                    infowindow.setContent('<div class="infowindow">' + address + '</div>');
                    infowindow.open(map, this);

                });
            }
        });

        // google.maps.event.addDomListener(document, 'click', initialize);
    });


</script>

<?php get_footer(); ?>