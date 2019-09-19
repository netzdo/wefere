(function($) {

  /*
  *  new_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	$el (jQuery element)
  *  @return	n/a
  */
  var map;
  function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
      zoom		: 10,
      center		: new google.maps.LatLng(0, 0),
      draggable:true,
      panControl:false,
      scaleControl:true,
      scrollwheel: false,
      streetViewControl:false,
      zoomControl: true,
      mapTypeId	: google.maps.MapTypeId.ROADMAP,
      //styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
    };


    // create map
    map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	$marker (jQuery element)
  *  @param	map (Google Map object)
  *  @return	n/a
  */
  var $infoWindows = [];

  $('.location').on('click',function(){
    for (var i=1;i<=$infoWindows.length;i++) {
      if($infoWindows[i]){
        $infoWindows[i].close();
      }
    }
    var _this = $(this);
    key = parseInt(_this.attr('data-k')) - 1;
    $infoWindows[1].open(map, map.markers[key]);

    $('html, body').animate({scrollTop:$('#mapMulti').offset().top}, 500, 'swing', function(){});
  });

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    var marker_icon = $marker.attr('data-k');
    if(!marker_icon){
      marker_icon = $('#assets_url').val()+'/img/pin.png';
    }else{
      marker_icon = 'https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_orange'+marker_icon+'.png';
    }


    // create marker
    var marker = new google.maps.Marker({
      position	: latlng,
      map			: map,
      icon: marker_icon
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content		: $marker.html()
      });

      $infoWindows[$marker.attr('data-k')] = infowindow;

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        for (var i=1;i<=$infoWindows.length;i++) {
          if($infoWindows[i]){
            $infoWindows[i].close();
          }
        }

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	map (Google Map object)
  *  @return	n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 15 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  /*
  *  document ready
  *
  *  This function will render each map when the document is ready (page has loaded)
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	5.0.0
  *
  *  @param	n/a
  *  @return	n/a
  */
  // global var
  var map = null;

  $(document).ready(function(){

    $('.acf-map').each(function(){

      // create map
      map = new_map( $(this) );
      $(window).resize(function(){
        center_map( map );
      });

    });

  });

  })(jQuery);