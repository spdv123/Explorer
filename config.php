<?php
	error_reporting(0);
	ob_start();
	session_start();
	$dblink=@mysql_connect("localhost","用户名","密码");
	if($dblink==null)
	{
		echo "数据库打开失败";
		exit;
	}
	mysql_query("SET NAMES 'utf8'");
  mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_results=utf8");
	mysql_select_db("数据库名");
?>
