<?php
if($_GET['action']=='login'){
		include_once("config.php");
    //include_once("safe.php");
    $username=addslashes(trim($_POST['username']));
    $password=addslashes(trim($_POST['password']));
    $password=md5($password);
    $sql = "select username from user where username='".$username."'";
    $res = mysql_query($sql);
    if(mysql_num_rows($res)>0){
    		$sql = "select password from user where password='".$password."'";
        $res = mysql_query($sql);
        if(mysql_num_rows($res)>0){
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            $result["ok"]=1;
            echo json_encode($result);
        }else{
        	$result["ok"]=0;
          echo json_encode($result);
       }
   }else{
   		$result["ok"]=0;
      echo json_encode($result);
    }
} elseif($_GET['action']=='logout') {
	session_start();
	session_unset();
	$result['ok'] = 1;
	echo json_encode($result);
}
?>
