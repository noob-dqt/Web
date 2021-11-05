 <?php
	session_start();
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	mysqli_select_db($conn,'liuyanban');
	$search=$_SESSION["username"];
	$sql="select * from mybd where username='$search' or email='$search' or phonenumber='$search' ";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
	$username=$row["username"];
	$phonenumber=$row["phonenumber"];
	$email=$row["email"];
	$imgurl='../images/'.$row["image"];
	$password=$row["password"];
//**********************************
	$_SESSION["username"]=$username;
	$_SESSION["phonenumber"]=$phonenumber;
	$_SESSION["email"]=$email;

	// $_SESSION["password"]=$password;
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- iPhone端页面全屏-->
	<meta name="format-detection" content="telephone=no" /> <!-- 取消数字被识别为号码-->
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<style type="text/css">
		body,html{
			width: 100%;
			height: 100%;
			padding: 0;
			margin: 0;
		}
		.box{
			filter: blur(1px);
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			opacity: 0.7;
			z-index: -1;
		}
		.main-cont{
			color: white;
			overflow: hidden;
			width: 60%;
			height: 100%;
			margin:10% 0 0 35%;
			text-align: center;
			background-color:#565558;
			border-radius: 15%;
			opacity: 0.7;
		}
		.main-cont img{
			border-radius: 100%;
			width: 18vh;
			height: 18vh;
		}
		.form{
			margin:1% 0 0 25%;
		}
		.form p{
			display: inline;
		}
		.form input{
			display: inline;

		}
		.form button{
			color: black;
			display:inline;
		}
		p{
			float: none;
		}
		a{
			color: white;
		}
		a:hover{
			color: red;
		}
	</style>
</head>
<body>

	
	<img class="box" src="../images/touxiang1.png">
	<div style="padding: 0;margin:0;" class="container">
		<div class="main-cont">
			<h2>欢迎登录，<?php echo "$username";?></h2>
			<img src=<?php echo "$imgurl" ;?>>
			<form action="./uploadimg.php" enctype="multipart/form-data" method="post">
				<div class="form">
					<p>上传/更改头像:</p>
					<input type="file" name="pic">
					<button type="submit">上传</button>
				</div>
			</form> 
			<p>用户名：<?php echo "$username" ;?></p>
			<p>邮箱：<?php echo "$email" ;?></p>
			<p>手机号：<?php echo "$phonenumber" ;?></p>
			<br><br>
			<a class="change" href="./change-info.php">修改个人信息</a>
			<button style="display: block;margin: auto;" class="bnt btn-info"><a href="../liuyanbanindex.php">返回主页 </a></button>
		</div>
	</div>
</body>
</html>
