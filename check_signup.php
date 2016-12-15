<?php
if($_POST){
	include_once("config.php");
    //include_once("safe.php");
    $username=addslashes(trim($_POST['username']));
    $password=addslashes(trim($_POST['password']));
    $password2=addslashes(trim($_POST['password2']));
    $password=md5($password);
    $sql = "select username from user where username='".$username."'";
    $res = mysql_query($sql);
    if(mysql_num_rows($res)>0){
    	$result["ok"]=0;
        echo json_encode($result);
   }else{
        $user_in = "insert into user(username,password) values('$username','$password')";
        mysql_query($user_in);
        $_SESSION['username']=$username;
   		$result["ok"]=1;
        echo json_encode($result);
    }
}
?>
