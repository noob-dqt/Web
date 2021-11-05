<?php
	include('connect.php');
	mysqli_select_db($conn,'secret');
	$msgs=$_POST["user_secret"];
	$newname=uniqid();
	$tim=date("Y-m-d H:i:s",time());
	$sqlall="select * from original_data";
	$num=mysqli_num_rows(mysqli_query($conn,$sqlall))+1;
	$sql="insert into original_data(num,id,content,time) value('{$num}','{$newname}','{$msgs}','{$tim}')";
	if(!mysqli_query($conn,$sql)){
		$arr = '发布失败，请稍后再试'; 
		exit($arr);
	}
	else{
		$arr = '发布成功'; 
		exit($arr);
	}
    mysqli_close($conn);
?>