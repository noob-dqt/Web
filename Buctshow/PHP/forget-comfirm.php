<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	session_start();
	mysqli_select_db($conn,'liuyanban');
	$email=$_POST["email"];
	$password=$_POST["pwd"];
	$conf_password=$_POST["confirmpwd"];
	$mailcf=$_POST["mailcf"];
	$rightcf=$_SESSION[$email.'find'];

	$sql1="select * from mybd where email = '$email'";
	$res1=mysqli_num_rows(mysqli_query($conn,$sql1));

	if(!($email&&$password&&$conf_password&&$mailcf)){
		exit('请将信息填写完整');
	}

	if($res1){    //账号存在
		if($mailcf==$rightcf){//验证码正确
			if(!preg_match('/^[\w.!@]{8,20}$/', $password)){
				exit('密码格式错误；长度不小于8位，不大于20位，可以包含字母、数字以及_.@!等4种特殊字符！');
			}
			if($password!=$conf_password){
				exit('两次输入的密码不一致');
			}
			$sqlud="update mybd set password='$password' where email='$email';";
			if(mysqli_query($conn,$sqlud)){
				exit('密码修改成功');
			}
			else{
				exit('修改失败，请联系管理员或稍后再试');
			}
		}
		else{
			exit('验证码不正确');
		}
	}
	else{
		exit('此账号还未注册');
	}
	
	mysql_close($conn);
?>