<?php 
	// header('Content-type:text/html;charset=utf-8');
	session_start();
	include('connect.php');
	mysqli_select_db($conn,'liuyanban');

	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["pwd"];
	$conf_password=$_POST["confirmpwd"];
	$mailcf=$_POST["mailcf"];
	$rightmcf=$_SESSION[$email];

	// exit($username."+".$email."+".$password.$conf_password."+".$mailcf."+".$rightmcf);

	$sql1="select * from mybd where username = '$username'";
	$sql2="select * from mybd where email = '$email'";

	if(!($username&&$email&&$password&&$conf_password&&$mailcf)){
		exit("请填写完整信息");
	}
	if(mysqli_num_rows(mysqli_query($conn,$sql2))){
		exit('邮箱已经注册过无需再次注册，直接登录就可以啦！');
	}
	if(mysqli_num_rows(mysqli_query($conn,$sql1))){
		exit('这个名字已经有人用啦！');
	}
	if(strlen($username)>45){
		exit('名字太长了~');
	}
	if($rightmcf!=$mailcf){
		// $email+"对应的验证码："+$_SESSION[$email]
		exit("验证码错误");
	}
	if(!preg_match('/^[\w.!@]{8,20}$/', $password)){
		exit('密码格式错误；长度不小于8位，不大于20位，可以包含字母、数字以及_.@!等4种特殊字符！');
	}
	if($password!=$conf_password){
		exit('两次输入的密码不一致');
	}
	//通过所有验证，数据插入数据库
	$orgpic="../userpic/headimg.jpg";
	$sqlin="insert into mybd(username,password,email,image) value('{$username}','{$password}','{$email}','{$orgpic}')";
	if(!mysqli_query($conn,$sqlin)){
		// die('Could not enter data: ' . mysqli_error($conn));
		exit('注册失败，请联系管理员或稍后再试');
	}
	else{
		//注册成功并登录
        // session_start();
	    // setcookie("admin",$username,time()+3600);
        $_SESSION["username"] = $username;
        exit('注册成功');
	}
	mysqli_close($conn);
?>