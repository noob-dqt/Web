<?php
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
	mysqli_select_db($conn,'liuyanban');
	session_start();
	$username=$_SESSION["username"];
	$to="../my_information.php";
	$allowedExts = array("jpeg", "jpg", "png");

	$temp = explode(".", $_FILES["pic"]["name"]);//名字打散成数组
	$extension=end($temp);//取后缀
// $a=$_FILES['pic']['name'];$b=$_FILES['pic']['type'];
	// echo "<script>alert('$a');alert('$b');</script>";
	if ($_FILES["file"]["error"] > 0)
	{
		echo $_FILES["file"]["error"]."<script>alert('出现一些未知错误，请联系管理员或稍后再试');window.location.href='$to'</script>";
		exit();
	}

	if(!in_array($extension, $allowedExts)){
		echo "<script>alert('仅支持jpeg、jpg、png等格式');window.location.href='$to'</script>";
		exit();
	}
	if($_FILES["pic"]["size"]>3145728) //小于3MB
	{
		echo "<script>alert('最大能上传5MB的图片');window.location.href='$to'</script>";
		exit();
	}
	// echo "后缀是:" . "$extension<br>"."文件名为：".$_FILES["pic"]["name"];
	// $path="../../userpic/".$_FILES["pic"]["name"];
	// $sql1="select * from userdata where image='$path'";//检测是否有重名文件
	// if(mysqli_num_rows(mysqli_query($conn,$sql1))){//有同名的文件了
		// }
	$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$chararr=str_split($chars);//字符串转数组
	shuffle($chararr);//打乱顺序
	$temparr=array_rand($chararr,5);//随机取十个字符存在temparr数组中
	for ($i=0; $i < 5; $i++) { 
		$newname.= $chararr[$temparr[$i]];
	}
	// $path="http://campusdaily.top/userpic/".$newname.time().".".$extension;
	$path="../userpic/".$newname.time().".".$extension;
	// echo "$path<br>$username<br>$email<br>$phonenumber";
	//将图片上传至服务器并把路径存入数据库
	if(!move_uploaded_file($_FILES["pic"]["tmp_name"],$path)){
		echo "<script>alert('上传失败，请联系管理员或稍后再试');";
		// echo"<script>window.location.href='$to'</script></script>";
		exit();
	}
	$sqlud="update mybd set image='$path' where username='$username' or email='$username'";
	if(mysqli_query($conn,$sqlud)){
		echo "<script>alert('上传成功');window.location.href='$to'</script>";
	}
	else{
		echo "<script>alert('上传失败，请联系管理员或稍后再试');window.location.href='$to'</script>";
	}
	mysqli_close($conn);
?>