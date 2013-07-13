
var line;

//Initialize Google map
function initialize() {
  var latlng1 = new google.maps.LatLng(Drupal.settings.custom_crowdsourcing_map.lat1, Drupal.settings.custom_crowdsourcing_map.lon1);
  var latlng2 = new google.maps.LatLng(Drupal.settings.custom_crowdsourcing_map.lat2, Drupal.settings.custom_crowdsourcing_map.lon2);
  var offset = Drupal.settings.custom_crowdsourcing_map.offset;

  var mapOptions = {
    center: latlng2,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  var image1 = Drupal.settings.custom_crowdsourcing_map.base_path + 'letter_a.png';

  var marker1 = new google.maps.Marker({
    position: latlng1,
    map: map,
    icon: image1
  });

  var image2 = Drupal.settings.custom_crowdsourcing_map.base_path + 'letter_b.png';

  var marker2 = new google.maps.Marker({
    position: latlng2,
    map: map,
    icon: image2
  });

  var flightPlanCoordinates = [
    latlng1,
    latlng2
  ];

  var lineSymbol = {
    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
    scale: 4,
    strokeColor: '#000000'

  };

  line = new google.maps.Polyline({
    path: flightPlanCoordinates,
    icons: [{
        icon: lineSymbol,
        offset: offset+"%"
      }],
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
    map: map
  });

  animateCircle();

}

function animateCircle() {
  var timeout = Drupal.settings.custom_crowdsourcing_map.timeout * 1000;
  var offset = Drupal.settings.custom_crowdsourcing_map.offset;
  if (timeout > 0) {
    offsetId = window.setInterval(function() {
      var icons = line.get('icons');
      offset++;
      if (offset < 99) {
        icons[0].offset = offset + '%';
        line.set('icons', icons);
      }
      else {
        icons[0].offset = '100%';
        line.set('icons', icons);
        clearInterval(offsetId);
      }
    }, timeout);
  }
}


google.maps.event.addDomListener(window, 'load', initialize);

