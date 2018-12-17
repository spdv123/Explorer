<?php
	function file_rep_contents($filename, $arr) {
			$content = file_get_contents($filename);

			$rep_before = array();
			$rep_after = array();
			foreach ($arr as $key => $value) {
				$rep_before[] = "{data.".$key."}";
				$rep_after[] = $value;
			}
			$content = str_replace($rep_before, $rep_after, $content);
			$content = preg_replace("/{data[._0-9a-zA-Z-]+}/", "", $content);

			return $content;
	}
	error_reporting(0);
	ob_start();
	session_start();
	$dblink=@mysql_connect("localhost","USERNAME","PASSWORD");
	if($dblink==null)
	{
		echo "open database error";
		exit;
	}
	mysql_query("SET NAMES 'utf8'");
  mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_results=utf8");
	mysql_select_db("DATABASE_NAME");
?>
