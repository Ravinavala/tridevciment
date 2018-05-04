var dateToday = new Date(); 
jQuery(function() {
    jQuery("#datepicker").datepicker({
         dateFormat: 'dd/mm/yy' ,
          todayHighlight: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
      //  showButtonPanel: true,
        minDate: dateToday
    });
});



/* Autocomplete address on post new ad page */

    function initialize() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            jQuery('#loc_lat').html(place.geometry.location.lat());
            jQuery('#loc_long').html(place.geometry.location.lng());
            jQuery('#loc_lat_value').val(place.geometry.location.lat());
            jQuery('#loc_long_value').val(place.geometry.location.lng());
            jQuery('.location_text').show();
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    /* End autocomplete address on post new ad page */

    /* Display map on click of show location button */

    var lat = jQuery('#loc_lat_value').val();
    var lng = jQuery('#loc_long_value').val();
    var latlng = new google.maps.LatLng(lat, lng);
    var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: true
    });
    var infoWindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function (a) {
        var markerContent = jQuery('#location').val();
        infoWindow.setContent(markerContent);
        infoWindow.open(map, this);
    });

    jQuery('.show-location').click(function () {
        debugger;
        var lat = jQuery('#loc_lat_value').val();
        var lng = jQuery('#loc_long_value').val();
        var latlng = new google.maps.LatLng(lat, lng);
        
        var map = new google.maps.Map(document.getElementById('display_map'), {
            center: latlng,
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: 'Set lat/lon values for this property',
            draggable: true
        });
        var infoWindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', function (a) {
            var markerContent = jQuery('#location').val();
            infoWindow.setContent(markerContent);
            infoWindow.open(map, this);
        });
    });
    /* End display map on click of show location button */
        //Disable date picker
     jQuery('#available_now').click(function () {
        jQuery("#datepicker").prop('disabled', true);
      
    });

    jQuery('#available_date').click(function () {
        jQuery("#datepicker").prop('disabled', false);
        
    });
    
    //display google map 
    
			jQuery('#disp_latitude').html(jQuery('#loc_lat_value').val());
			jQuery('#disp_longitude').html(jQuery('#loc_long_value').val());
		
			// Display Map
			var lat = jQuery('#loc_lat_value').val();
			var lng = jQuery('#loc_long_value').val();
			var latlng = new google.maps.LatLng(lat, lng);
			var map = new google.maps.Map(document.getElementById('display_map'), {
				center: latlng,
				zoom: 11,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				title: 'Set lat/lon values for this property',
				draggable: true
			});
			var infoWindow = new google.maps.InfoWindow();
			google.maps.event.addListener(marker, 'click', function (a) {
				var markerContent = jQuery('#location').val();
				infoWindow.setContent(markerContent);
				infoWindow.open(map, this);
			});
    
    
    
    
    
    