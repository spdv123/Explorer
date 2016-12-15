/*
@author: spdv123
*/

// 准备div，显示第三部分
function summary_prepare() {
  $('#secondpart').hide();
  $('#firstpart').hide();
  $('#minimapdiv').hide();
  $('#pano').hide();
  $('#thirdpart').show();
  $('#return_index2').show();
  //$('#restart-btn').show();
}

// 将获取到的游戏结果设置到全局
function set_summary_res(res) {
  window.summary_res = res;
}

// 返回地址
function get_real_ll(i) {
  // still not work
  return window.real_ll_arrays[i][0] + ',' + window.real_ll_arrays[i][1];
}

// 根据全局的游戏结果绘制地图
function summary_show() {
  var res = window.summary_res;
  var total_score = res.total_score;
  changevaluebar2(total_score / (5000 * 5));

  window.real_ll_arrays = [];
  for (var i = 0; i < 5; i++) {
    window.real_ll_arrays.push(res.real_statics[i].replace(/[\])}[{(]/g, '').replace(/\s/g, '').split(','));
  }
  var real_ll_arrays = window.real_ll_arrays;
  var select_ll_arrays = [];
  for (var i = 0; i < 5; i++) {
    select_ll_arrays.push(res.select_statics[i].replace(/[\])}[{(]/g, '').replace(/\s/g, '').split(','));
  }

  var real_lls = [];
  for(var i=0; i<5;i++) {
    real_lls.push(new google.maps.LatLng(real_ll_arrays[i][0], real_ll_arrays[i][1]));
  }
  var select_lls = [];
  for(var i=0; i<5;i++) {
    select_lls.push(new google.maps.LatLng(select_ll_arrays[i][0], select_ll_arrays[i][1]));
  }

  var bounds = new google.maps.LatLngBounds();
  for(var i=0; i<5; i++) {
    bounds.extend(real_lls[i]);
    bounds.extend(select_lls[i]);
  }

  // draw map
  var map_options = {
    mapTypeControl: false,
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var summary_map = new google.maps.Map($('#summarymap')[0], map_options);
  summary_map.fitBounds(bounds);

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

  var real_markers = [];
  for(var i=0; i<5; i++) {
    real_markers.push(new google.maps.Marker({
        position: real_lls[i],
        title:"真实位置" + (i+1),
        icon: real_icon
    }));
    real_markers[i].addListener('click', function() {
      var real_url = "http://maps.google.cn/maps?q=&layer=c&cbll=";
      real_url += get_real_ll(i);
      open_url(real_url);
      // Any better solutions ?
    });
    real_markers[i].setMap(summary_map);
  }
  var select_markers = [];
  for(var i=0; i<5; i++) {
    select_markers.push(new google.maps.Marker({
        position: select_lls[i],
        title:"你猜测的位置" + (i+1),
        icon: select_icon
    }));
    select_markers[i].setMap(summary_map);
  }

  var real_select_lines = [];
  var dotted = {
    path: 'M 0,-1 0,1',
    strokeOpacity: 1,
    scale: 2
  };
  for(var i=0; i<5; i++) {
    real_select_lines.push([
      real_lls[i],
      select_lls[i]
    ]);
    new google.maps.Polyline({
      path: real_select_lines[i],
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
    }).setMap(summary_map);
  }

}
