<?php 
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
    mysqli_select_db($conn,'liuyanban');
    $email=$_POST["email"];
	$orgpass=$_POST["org-pass"];
	$newname=$_POST["new-name"];
	$newpass=$_POST["new-pass"];
	$confir_newpass=$_POST["confir-new-pass"];
	// $to="./change-info.php";
	$sql="select * from mybd where email = '$email' and password='$orgpass'";
	$sql1="select * from mybd where username = '$newname'";
	if(!mysqli_num_rows(mysqli_query($conn,$sql))){
		exit('原信息填写错误');
	}
	if(!$newname&&!$newpass&&!$confir_newpass){
		exit('至少得填些什么吧~');
	}
	if($newpass&&$confir_newpass){
		if(!preg_match('/^[\w.!@]{8,20}$/', $newpass)){
			exit('密码格式错误；长度不小于8位，不大于20位，可以包含字母、数字以及_.@!等4种特殊字符！');
		}
		if($newpass!=$confir_newpass){
			exit('两次输入的密码不一致');
		}
		$sqludpass="update mybd set password='$newpass' where email='$email';";
			if(mysqli_query($conn,$sqludpass)){
				$f=1;
			}
			else{
				exit('修改失败，请联系管理员或稍后再试');
			}
	}
	if($newname){
		if(mysqli_num_rows(mysqli_query($conn,$sql1))){
			exit('这个名字已经有人用啦！');
		}
		else{
			$sqlud="update mybd set username='$newname' where email='$email' ;";
			if(mysqli_query($conn,$sqlud)){
				$f=1;
			}
			else{
				exit('修改失败，请联系管理员或稍后再试');
			}
		}
	}
	mysqli_close($conn);
	if($f==1)
	exit('修改成功,请重新登录');
 ?>