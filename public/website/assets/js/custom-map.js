
/////////////////////////////////////////////////////////////////
// Map
/////////////////////////////////////////////////////////////////



    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 14,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(14.562353, 121.046417), //EC Nicolas Res. 8223 Sgt. F. Yabut Circle, Guadalupe Nuevo, Makati City

            scrollwheel: false,

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.

            styles: [{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"lightness":"0"}]},{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"weight":"0.91"},{"lightness":"0"}]},{"featureType":"administrative.land_parcel","elementType":"geometry","stylers":[{"weight":"1.57"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"lightness":"0"},{"saturation":"0"},{"gamma":"1"},{"weight":"1"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry","stylers":[{"lightness":"0"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"weight":"1.00"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"weight":"2.00"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"weight":"1.40"},{"lightness":"0"},{"gamma":"5"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ffffff"}]}]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(14.562353, 121.046417),
            map: map,
            title: 'Snazzy!'
        });
    }
