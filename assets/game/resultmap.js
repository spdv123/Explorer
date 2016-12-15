/*
@auther: spdv123
*/
function calc_distance(fromLat, fromLng, toLat, toLng) {
  return google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(fromLat, fromLng), new google.maps.LatLng(toLat, toLng));
};

function init_result_map_html() {
  /*$("#select-btn").hide();*/
  $('#select-btn').css('pointer-events', 'none');
  $('#select-btn').css('background', '#a0a0a0');
  $("#minimapdiv").hide();
  $('#return_index').hide();
  $('#return_index2').hide();
  window.MINIMAP = null;
  window.GUESS_MARKER = null;
  $("#result-div").show();
}

function result_destroy() {
  $('#secondpart').hide();
  $('#firstpart').show();
  $('#minimapdiv').show();
  $('#return_index').hide();
  $('#return_index2').hide();
  $('#pano').show();
  screen_change();
}

// 根据总成绩返回一些话
function get_summary_talk(score) {
  if (score < 1000) {
    return "完美地找错了所有的点...";
  } else if (score < 3000) {
    return "多玩几次会做的更好的~";
  } else if (score < 7000) {
    return "干得不错，继续看看其他的美景吧!";
  } else if (score < 18000) {
    return "很出色了，还能更进一步吗?";
  } else {
    return "佩服佩服，周游过世界吗~?";
  }
}

// update the info on window
function result_info_update(res) {
  var dist = res.distance;
  var score = res.score;
  window.round += 1;
  $("#round-label").html(window.round);
  window.total_score += score;
  $("#summary-btn").hide();
  $("#total-score").html(window.total_score);
  $("#total-score2").html(window.total_score+"分，"+get_summary_talk(window.total_score));
  // select which
  if(res.next_round == -1) {
    $("#next-btn").hide();
    set_summary_res(res);
    $("#summary-btn").show();
    $('#return_index').show();
  } else {
    $("#next-btn").show();
    $("#summary-btn").hide();
  }
  changevaluebar1(score / 5000.0);
  $("#current-score").html(score);
  $("#current-distance").html(dist);
}

// open url in new tab without alert
function open_url(url) {
  $.ajax({
    type:"post",
    dataType:"json",
    url: 'assets/game/deal_game.php',
    data: {'nothing' : 1},
    success: function(){
       window.open(url);
    },
    async: false
  });
}

function result_show_callback(res) {
  loadingImgHide();
  var select_ll_array = window.select_lat_lng.toString()
    .replace(/[\])}[{(]/g,'').replace(/\s/g, "").split(',');
  // real location
  var real_ll_array = res.before_real_loc.toString()
    .replace(/[\])}[{(]/g,'').replace(/\s/g, "").split(',');

  var real_ll = new google.maps.LatLng(real_ll_array[0], real_ll_array[1]);
  var select_ll = new google.maps.LatLng(select_ll_array[0], select_ll_array[1]);

  // calc the distance, 0.1 reversed
  var dist = res.distance;
  // init html element
  init_result_map_html();
  result_info_update(res);

  // draw map
  var map_options = {
    mapTypeControl: false,
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var result_map = new google.maps.Map($('#resultmap')[0], map_options);

  var bounds = new google.maps.LatLngBounds();
  bounds.extend(real_ll);
  bounds.extend(select_ll);
  result_map.fitBounds(bounds);

  // draw marker
  var real_icon = new google.maps.MarkerImage(
      "assets/img/flag.png",
      null,null,null,
      new google.maps.Size(20, 20)
  );

  var select_icon = new google.maps.MarkerImage(
      "assets/img/marker.png",
      null,null,null,
      new google.maps.Size(20, 20)
  );

  var real_marker = new google.maps.Marker({
      position: real_ll,
      title:"真实位置",
      icon: real_icon
  });

  var select_marker = new google.maps.Marker({
      position: select_ll,
      title:"你猜测的位置",
      icon: select_icon
  });

  real_marker.addListener('click', function() {
    var real_url = "http://maps.google.cn/maps?q=&layer=c&cbll=";
    real_url += real_ll_array[0] + ',' + real_ll_array[1];
    open_url(real_url);

    // Any better solutions ?
  });

  // set marker to map
  real_marker.setMap(result_map);
  select_marker.setMap(result_map);

  // draw line
  var real_select_line = [
    real_ll,
    //middle_ll,
    select_ll
  ];
  var dotted = {
    path: 'M 0,-1 0,1',
    strokeOpacity: 1,
    scale: 2
  };
  var real_select_path = new google.maps.Polyline({
    path: real_select_line,
    geodesic: false,
    strokeColor: '#000000',
    strokeOpacity: 0,
    strokeWeight: 1,
    icons: [
      {
        icon: dotted,
        offset: '0',
        repeat: '8px'
      }
    ],
  });
  // set line to map
  real_select_path.setMap(result_map);
}

// init result map
function result_initialize() {
  // select location
  if(!window.select_lat_lng) return;
  loadingImgShow();
  $.ajax({
            type:"post",
            url:'assets/game/deal_game.php',
            dataType:"json",
            async:false,
            data:{'cal': 1,'select_loc': window.select_lat_lng.toString()},
            success:function(res){
                if(!res.ok){
                  $(document.body).html('<h1>Error,Something wrong...</h1>');
                  //exit();
                } else {
                  result_show_callback(res);
                }
            }
  });

}
