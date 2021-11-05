<?php
	session_start();
	$user=$_SESSION["username"];
	$intro=$_POST['intro'];
	include('connect.php');
	mysqli_select_db($conn,'liuyanban');
	$sqlud="update mybd set introduction='$intro' where email='$user' or username='$user' ;";
	if(mysqli_query($conn,$sqlud)){
		exit('保存成功');
	}
	else{
		exit('修改失败，请联系管理员或稍后再试');
	}

?>