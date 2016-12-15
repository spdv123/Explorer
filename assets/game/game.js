/*
@auther: spdv123
*
function extra_initialize() {
  window.BOUNDS = new google.maps.LatLngBounds();
  window.BOUNDS.extend(new google.maps.LatLng(64.77,-18.28));
  window.BOUNDS.extend(new google.maps.LatLng(-40.97, -92.81));
  window.BOUNDS.extend(new google.maps.LatLng(17.97, 108.28));
}*/

function php_init() {
  $.ajax({
          type:"post",
          url:'assets/game/deal_game.php',
          dataType:"json",
          async:false,
          data:{'init': 1},
          success:function(res){
              if(!res.ok){
                  $(document.body).html('<h1>Error,Something wrong...</h1>');
                  //exit();
              }
          }
  });
}

function game_restart() {
  $('#secondpart').hide();
  $('#firstpart').show();
  $('#minimapdiv').show();
  $('#pano').show();
  $('#thirdpart').hide();
  php_init();
  pano_initialize();
  minimap_initialize();
  window.total_score = 0;
  window.round = 1;
  $("#round-label").html(window.round);
  $("#total-score").html(window.total_score);
  $("#total-score2").html(window.total_score);
}

function game_start() {
  php_init();
  //extra_initialize();
  pano_initialize();
  minimap_initialize();
  window.total_score = 0;
  window.round = 1;

  // select and submit
  $('#select-btn').click(function (){
    result_initialize();
  });

  $('#next-btn').click(function () {
    result_destroy();
    pano_initialize();
    minimap_initialize();
  });

  $('#summary-btn').click(function () {
    summary_prepare();
    summary_show();
  });

  $('#restart-btn').click(function() {
    game_restart();
  });
  setInterval("remove_pano_google()", "200");
}

$(document).ready(function() {
  game_start();
});
