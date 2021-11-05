<?php
function delcookie(){
		setcookie("refre", "false", time()+3600);
		setcookie("curr", "0", time()+3600);
}
	$refre=$_POST["refre"];
	if($refre=="false"){
		delcookie();
		exit();
	}
	include('connect.php');
	mysqli_select_db($conn,'secret');
	$msgs=$_POST["user_rep"];
	if($msgs==NULL){
		$arr = '请输入回复内容'; 
		exit($arr);
	}
	$fan=$_POST["fan"];
	$newname=uniqid();
	$tim=date("Y-m-d H:i:s",time());
	$sqlall="select * from reply_data";
	$num=mysqli_num_rows(mysqli_query($conn,$sqlall))+1;
	$sql="insert into reply_data(num,fnum,id,content,time) value('{$num}','{$fan}','{$newname}','{$msgs}','{$tim}')";
	if(!mysqli_query($conn,$sql)){
		$arr = '回复失败，请稍后再试'; 
		exit($arr);
	}
	else{
		$arr = '回复成功'; 
		exit($arr);
	}
    mysqli_close($conn);
?>
