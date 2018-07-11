jQuery(document).foundation();

window.TXS = {};

TXS.init = $.extend({
	HomeTestimonialSlider: function() {
		$('.testimonial-list').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  dots: false,
		  arrows: true,
		  centerMode: false,
		  focusOnSelect: true,
		  nextArrow: '<button class="slick-next"><i></i></button>',
			prevArrow: '<button class="slick-prev"><i></i></button>',
			infinite: false,
			autoplay: true,
  		autoplaySpeed: 4000,
		});
	},
  HeroTestimonialSlider: function() {
    if( $('.hero-testimonials-slider').length < 0 ) return;

    $('.hero-testimonials-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      centerMode: false,
      focusOnSelect: true,
      nextArrow: '<button class="slick-next"><i class="fa fa-chevron-right"></i></button>',
      prevArrow: '<button class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      appendArrows: $('.hero-testimonials .arrows')
    });
  },
  
  SVG:function() {
    jQuery('img.svg').each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
  
      jQuery.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');
  
          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }
  
          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');
          
          // Check if the viewport is set, else we gonna set it if we can.
          if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
          }
  
          // Replace image with new SVG
          $img.replaceWith($svg);
  
      }, 'xml');
    });
  }
});

// GOOGLE MAP
var map;
TXS.googleMap = $.extend({
  gmap_new_map: function( $el ) {
    var $markers = $el.find('.marker');
    var $mapType = $el.data('map_type_id') != undefined ? $el.data('map_type_id') : google.maps.MapTypeId.ROATXSAP;
    var mapargs = {
      center: new google.maps.LatLng(55.90878, -7.69042),
      scrollwheel: false,
      navigationControl: false,
      mapTypeControl: false,
      scaleControl: false,
      draggable: false,
      zoom: 10,
      maxZoom: 10,
      mapTypeId : google.maps.MapTypeId.ROADMAP
    };
      
    map = new google.maps.Map( $el[0], mapargs);
    
    // add a markers reference
    map.markers = [];
    
    // add markers
    $markers.each(function(){
      TXS.googleMap.gmap_add_marker( $(this), map );
    });
    
    // center map
    TXS.googleMap.gmap_center_map( map );
    return map; 
  },

  gmap_add_marker: function( $marker, map ) {
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      icon: templateDir+'/assets/images/gmap-pin.png'
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open( map, marker );
      });
    }
  },

  gmap_center_map: function( map ) {
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){
      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
      bounds.extend( latlng );
    });

    // only 1 marker?
    if( map.markers.length == 1 ) {
      // set center of map
      map.setCenter( bounds.getCenter() );
      // map.panBy(150,0);
    } else {
      // fit to bounds
      map.fitBounds( bounds );
      
    }
  }
});

if( $('#map').length ){
  var contact_gmap = TXS.googleMap.gmap_new_map($('#map'));
}

TXS.init.HeroTestimonialSlider();
TXS.init.HomeTestimonialSlider();
TXS.init.SVG();