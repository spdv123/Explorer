<?php
ini_set("display_errors", "On");
error_reporting(2047);
//include_once("../../safe.php");
include_once("../../config.php");
$MAX_ROUND=5;
if($_POST['init']){
	$_SESSION['round']=1;
	$_SESSION['total_score']=0;
    $sql = "select * from location order by rand() limit 1";
    $res = mysql_query($sql);
    $info = mysql_fetch_array($res);
	$_SESSION['real_loc']=$info['lat_lng'];
    $_SESSION['real_statics']=array();
    $_SESSION['select_statics']=array();
	$result['ok']=1;
	echo json_encode($result);
}elseif($_POST['get']){
	$result['round']=$_SESSION['round'];
	$result['real_loc']=$_SESSION['real_loc'];
	$result['ok']=1;
	echo json_encode($result);
}elseif($_POST['cal']){
	$select_loc=$_POST['select_loc'];
  $select_loc=str_replace('\\', '',$select_loc);
  $select_loc=str_replace('"','',$select_loc);
	$select_loc=str_replace('(', '',$select_loc);
  $select_loc=str_replace(')','',$select_loc);

	$real_loc=$_SESSION['real_loc'];
	$fP1=explode(',',$select_loc);
	$fP2=explode(',',$real_loc);
	$result['ok']=1;
    // $result['fP10']=(float)$fP1[0];
    // $result['fP11']=(float)$fP1[1];
    // $result['fP20']=(float)$fP2[0];
    // $result['fP21']=(float)$fP2[1];
    // $result['debug_select']=$select_loc;

    // $result['debug']=getDistance((float)'59.91132',(float)'10.704117',(float)'58.91032',(float)'8.703117')/1000.0;
    // $result['debug']=sprintf("%.1f",$result['debug']);
	$result['distance']=getDistance((float)$fP1[0],(float)$fP1[1],(float)$fP2[0],(float)$fP2[1])/1000.0;
	$result['distance']=sprintf("%.1f",$result['distance']);
    $score=calc_score((double)$result['distance']);
    $_SESSION['round']+=1;
    $_SESSION['total_score']+=$score;
    $result['before_real_loc']=$real_loc;
    $result['total_score']=$_SESSION['total_score'];
    $result['score']=$score;
		//get a new location
		$sql = "select * from location order by rand() limit 1";
		$res = mysql_query($sql);
		$info = mysql_fetch_array($res);
		$_SESSION['real_loc']=$info['lat_lng'];
		$result['real_loc']=$info['lat_lng'];
		array_push($_SESSION['real_statics'],$real_loc);
		array_push($_SESSION['select_statics'],$select_loc);
		$result['real_statics']=$_SESSION['real_statics'];
		$result['select_statics']=$_SESSION['select_statics'];
    if($_SESSION['round']>$MAX_ROUND){
			  // next round
        $result['next_round']=-1;
				//xdebug_start_trace();
        if($_SESSION['username']){
            $username=$_SESSION['username'];
            $sql = "select * from user where username='".$username."'";
            $res = mysql_query($sql);
            $userinfo = mysql_fetch_array($res);
            $game_count = $userinfo['game_count']+1;
            $total_score = $userinfo['total_score']+$_SESSION['total_score'];
            $sql = "update user set game_count=".$game_count." , total_score=".$total_score." where username='".$username."'";
            mysql_query($sql);
        }
				//xdebug_stop_trace();
        $_SESSION['round']=1;
        $_SESSION['total_score']=0;
        $_SESSION['real_statics']=array();
        $_SESSION['select_statics']=array();

        echo json_encode($result);
    }else{
        $result['next_round']=$_SESSION['round'];
        echo json_encode($result);
    }
} elseif($_POST['nothing']) {
		$result['ok'] = 1;
		echo json_encode($result);
}
function calc_score($distance) {
    $x = $distance;
    $y1 = 5248 * exp(-7e-4 * $x);
    $y1 = floor($y1);
    $y = min($y1, 5000);
    return $y;
}
function rad($x){
    return $x*pi()/180;
}
function getDistance($fP1Lat, $fP1Lon, $fP2Lat, $fP2Lon){
    $R = 6378137;
    $dLat = rad($fP2Lat - $fP1Lat);
    $dLong = rad($fP2Lon - $fP1Lon);
    $a = sin($dLat / 2) * sin($dLat / 2) +
    cos(rad($fP1Lat)) * cos(rad($fP2Lat)) *
    sin($dLong / 2) * sin($dLong / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $d = $R * $c;
    return $d;
}
/**
 * 计算两个坐标之间的距离(米)
 * @param float $fP1Lat 起点(纬度)
 * @param float $fP1Lon 起点(经度)
 * @param float $fP2Lat 终点(纬度)
 * @param float $fP2Lon 终点(经度)
 * @return int
 */
function distanceBetween($fP1Lat, $fP1Lon, $fP2Lat, $fP2Lon){
    $fEARTH_RADIUS = 6378137;
    //角度换算成弧度
    $fRadLon1 = deg2rad($fP1Lon);
    $fRadLon2 = deg2rad($fP2Lon);
    $fRadLat1 = deg2rad($fP1Lat);
    $fRadLat2 = deg2rad($fP2Lat);
    //计算经纬度的差值
    $fD1 = abs($fRadLat1 - $fRadLat2);
    $fD2 = abs($fRadLon1 - $fRadLon2);
    //距离计算
    $fP = pow(sin($fD1/2), 2) +
          cos($fRadLat1) * cos($fRadLat2) * pow(sin($fD2/2), 2);
    return intval($fEARTH_RADIUS * 2 * asin(sqrt($fP)) + 0.5);
}
/**
 * 百度坐标系转换成标准GPS坐系
 * @param float $lnglat 坐标(如:106.426, 29.553404)
 * @return string 转换后的标准GPS值:
 */
function BD09LLtoWGS84($fLng, $fLat){ // 经度,纬度
    $lnglat = explode(',', $lnglat);
    list($x,$y) = $lnglat;
    $Baidu_Server = "http://api.map.baidu.com/ag/coord/convert?from=0&to=4&x={$x}&y={$y}";
    $result = @file_get_contents($Baidu_Server);
    $json = json_decode($result);
    if($json->error == 0){
        $bx = base64_decode($json->x);
        $by = base64_decode($json->y);
        $GPS_x = 2 * $x - $bx;
        $GPS_y = 2 * $y - $by;
        return $GPS_x.','.$GPS_y;//经度,纬度
    }else
        return $lnglat;
}
?>
