<?php	
    session_start();	
	$name=$_SESSION["admin"];
	$servername = "127.0.0.1:3306";
    $username = "root";
    $password = "123456";
    $dbname = "liuyanban";
	$conn = new mysqli($servername, $username, $password, $dbname);
    $path="./uimage/";
     $to="./liuyanbanindex.php";
    if($name!=null)
    {


    if($_FILES["pic"]["name"])   
   {   
   $file1=$_FILES["pic"]["name"];   
   $file2 = $path.time().$file1;   
   $flag=1;   
   }//END IF 
  
   echo "<div>$name</div>"  ;
    $result=move_uploaded_file($_FILES["pic"]["tmp_name"],$file2);
    $sql_insert = "INSERT INTO liuyan (username, comment)
                        VALUES ('$name', '$file2')";
    $res_insert = $conn->query($sql_insert);
    echo "<script>window.location.href='$to'</script>";
    if($result)
    {
    	echo "<div>djwidjwd</div>";
    }
    if($res_insert)
    {
    	echo "<div>oooo</div>";
    }
    }else
    {
    	echo "<script>alert('请先登录')</script>";
    	echo "<script>window.location.href='$to'</script>";
    }
	// $conn = new mysqli($servername, $username, $password, $dbname);
	// $allowedExts = array("gif", "jpeg", "jpg", "png");
	// $temp = explode(".", $_FILES["pic"]["name"]);//名字打散成数组
	// $extension=end($temp);//取后缀
 //    $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	// $chararr=str_split($chars);//字符串转数组
	// shuffle($chararr);//打乱顺序
	// $temparr=array_rand($chararr,5);//随机取十个字符存在temparr数组中
	// for ($i=0; $i < 5; $i++) { 
	// 	$newname.= $chararr[$temparr[$i]];
	// }
	// $path="./uimage/".$newname.time().".".$extension;
	// echo "$path<br>$username<br>$email<br>$phonenumber";
	//将图片上传至服务器并把路径存入数据库
	// if(!move_uploaded_file($_FILES["pic"],$path)){
	// 	echo "<script>alert('上传失败，请联系管理员或稍后再试');window.location.href='$to'</script>";
	// 	exit();
	// }
	// $sql_insert = "INSERT INTO liuyan (username, comment)
 //                        VALUES (2019040425, dwdwdwd)";
 //        $res_insert = $conn->query($sql_insert);
	// if(mysqli_query($conn,$sqlud)){
	// 	echo "<script>alert('上传成功');window.location.href='$to'</script>";
	// }
	// else{
	// 	echo "<script>alert('上传失败，请联系管理员或稍后再试');window.location.href='$to'</script>";
	// }
?>
