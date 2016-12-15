
function minimap_resize() {
  if(window.MINIMAP) {
    google.maps.event.trigger(window.MINIMAP, 'resize');
    //window.MINIMAP.setCenter(new google.maps.LatLng(17.97, 108.28));
    //window.MINIMAP.setZoom(1.5);
  }
}

function screen_change() //window size vary
{
  var width = document.body.clientWidth;
  if (width >= 400)
  {
    $("#fakeguess").hide();
  }
  function changemid()
  {
    document.getElementById("minimapdiv").style.width="150px";
    document.getElementById("minimapdiv").style.height="180px";
    document.getElementById("select-btn").style.fontSize="20px";
    document.getElementById("loadingImg").style.height="20px";
    $("#fakeguess").hide();
    $("#minimapdiv").show();
    minimap_resize();
  }
  function changebig()
  {
    document.getElementById("minimapdiv").style.width="300px";
    document.getElementById("minimapdiv").style.height="350px";
    document.getElementById("select-btn").style.fontSize="30px";
    document.getElementById("loadingImg").style.height="40px";
    $("#minimapdiv").show();
    $("#pano").show();
    $("#fakeguess").hide();
  }
  function hid()
  {
    $("#minimapdiv").hide();
    $("#fakeguess").show();
    document.getElementById("loadingImg").style.height="25px";
  }
  document.getElementById("pano").style.bottom="0px";
  if(width < 400)
  {
    hid();
    document.getElementById("pano").style.bottom="40px";
  }
  else if(width < 600) changemid();
  else changebig();
}

window.onresize = function()
{
  screen_change();
}

$(document).ready(function()
{
  screen_change();
  var width = document.body.clientWidth;

  $("#secondpart").hide();
  $("#thirdpart").hide();
});

function fakeguess_button()
{
  document.getElementById("minimapdiv").style.width="100%";
  document.getElementById("minimapdiv").style.height="100%";
  document.getElementById("minimapdiv").style.bottom="0px";
  document.getElementById("minimapdiv").style.right="0px";
  document.getElementById("minimap").style.bottom="30px";
  document.getElementById("select-btn").style.height="30px";
  $('#ScoreBoard').hide();
  $("#minimapdiv").show();
  $("#pano").hide();
  $("#fakeguess").hide();
  minimap_resize();
};
function guessButton()
{
  $("#secondpart").show();
  $("#firstpart").hide();
};
function viewSummary()
{
  $("#secondpart").hide();
  $("#thirdpart").show();
};
function changevaluebar1(ratio)
{
  var to = (ratio * 100) + "%";
  document.getElementById("value-bar1").style.width=to;
  document.getElementById("pinimagediv1").style.left=to;
};
function changevaluebar2(ratio)
{
  var to = (ratio * 100) + "%";
  document.getElementById("value-bar2").style.width=to;
  document.getElementById("pinimagediv2").style.left=to;
};
function onmouseoverButton(obj)
{
  obj.style.opacity="0.5";
}
function onmouseoutButton(obj)
{
  obj.style.opacity="1";
}
function loadingImgShow()
{
  $("#loadingImg").show();
  $("#guess-btn-text").hide();
}
function loadingImgHide()
{
  $("#loadingImg").hide();
  $("#guess-btn-text").show();
}
