/*
@auther: spdv123
*/
function pano_real_loc_callback(rand_loc) {
  var panorama = new google.maps.StreetViewPanorama(
      document.getElementById('pano'), {
        position: rand_loc,
        zoomControlOptions: {
          position: google.maps.ControlPosition.BOTTOM_LEFT
        },
        panControlOptions: {
          position: google.maps.ControlPosition.BOTTOM_LEFT
        },
        pov: {
          heading: 34,
          pitch: 10
        },
        fullscreenControl: false,
        addressControl: false,
        linksControl: false,
        enableCloseButton: false,
      });
}

function pano_initialize() {
  // init a pano map to dom pano
  get_rand_loc();
  $('#return_index').hide();
  $('#return_index2').hide();
}

function remove_pano_google() {
  // remove google links on pano map

  $('#pano a').each(function (i, dom) {
    if(dom.href && (dom.href.indexOf("www.google.com") != -1 || dom.href.indexOf("maps.google.com") != -1 ) ){
      dom.href = "https://maps.google.com";
      $(dom).remove();
    }
  });

  $('#pano a').each(function (i, dom) {
    if(dom.href && (dom.href.indexOf("www.google.cn") != -1 || dom.href.indexOf("maps.google.cn") != -1 ) ){
      dom.href = "https://maps.google.cn";
      $(dom).remove();
    }
  });
}
