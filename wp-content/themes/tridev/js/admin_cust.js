
 jQuery(document).ready(function ($) {
            $('.metabox_submit').click(function (e) {
                e.preventDefault();
                $('#publish').click();
            });
            $(document).on('click', '#add-row', function () {

                var row = $('.empty-row.screen-reader-text').clone(true);
                row.removeClass('empty-row screen-reader-text');
                row.insertBefore('#repeatable-fieldset-one tbody>tr:last');


                init_place();

                return false;
            });
            $('.remove-row').on('click', function () {
                $(this).parents('tr').remove();
                return false;
            });
            $('#repeatable-fieldset-one tbody').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });

        });      


function init_place() {
            jQuery('#repeatable-fieldset-one .location_info').each(function () {

                var input = $(this);
                var autocomplete = new google.maps.places.Autocomplete(input[0], {
                    types: ["geocode"]
                });

                google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
                    debugger;

                    var place = autocomplete.getPlace();
                     

                    jQuery(input).parents('td').find('.MapLat').val(place.geometry.location.lat());
                    
                    jQuery(input).parents('td').find('.MapLon').val(place.geometry.location.lng());
                });
            });


        }

        google.maps.event.addDomListener(window, 'load', init_place);