/*
@auther: spdv123
*/
function minimap_initialize() {
  $("minimapdiv").show();

  var guess_marker;

  // setup minimap
  var map_options = {
    center: new google.maps.LatLng(0, 0, true),
    zoom: 1,
    mapTypeControl: false,
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    draggableCursor:'crosshair'
  };

  var minimap = new google.maps.Map(
    document.getElementById('minimap'),
    map_options
  );

  // Marker selection setup
  var marker_icon = new google.maps.MarkerImage(
      "assets/img/marker.png",
      null, /* size is determined at runtime */
      null, /* origin is 0,0 */
      null, /* anchor is bottom center of the scaled image */
      new google.maps.Size(20, 20)
  );
  var marker_options = new google.maps.Marker({
      map: minimap,
      visible: true,
      title: '你猜测的位置',
      draggable: false,
      icon: marker_icon,
  });

  function set_guess_marker(guess) {
    if (guess_marker) {
      guess_marker.setPosition(guess);
    } else {
      guess_marker = new google.maps.Marker(marker_options);
      window.GUESS_MARKER = guess_marker;
      guess_marker.setPosition(guess);
    };
    /*$("#select-btn").show();*/
    $('#select-btn').css('pointer-events', 'auto');
    $('#select-btn').css('background', '#2ba560');
  };

  window.MINIMAP = minimap;

  google.maps.event.addListener(minimap, 'click', function(event) {
    window.select_lat_lng = event.latLng;
    set_guess_marker(window.select_lat_lng);
  });

};
