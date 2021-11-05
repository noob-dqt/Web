<?php		
	session_start();
	$name=$_SESSION["admin"];
	$_SESSION["username"]=$name;
	$servername = "127.0.0.1:3306";
    $username = "root";
    $password = "123456";
    $dbname = "liuyanban";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql1="select * from mybd where username='$name'  ";
	
    $to="./liuyanbanindex.php";
   if (isset($_GET['id']))
{
	 $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM liuyan WHERE id='$id'");
    echo "<script>alert('删除成功')</script>";
    echo "<script>window.location.href='$to'</script>";
}
     $comment=$_POST["cmt"];
     if($name!=null)
     {


     if($comment!=null){
     	$sql_insert = "INSERT INTO liuyan (username, comment)
                        VALUES ('$name', '$comment')";
        $res_insert = $conn->query($sql_insert);
        echo "<script>alert('发布成功')</script>";
     }
    
     $huifu=$_POST["HF"];
     $Rid=$_POST["Rname"];
     if($huifu!=null){
     	$sql_insert = "INSERT INTO liuyanhuifu (id,username, huifu)
                        VALUES ('$Rid','$name', '$huifu')";
        $res_insert = $conn->query($sql_insert);
        echo "<script>alert('回复成功')</script>";
     }
     echo "<script>window.location.href='$to'</script>";
    }else
    {
        echo "<script>alert('请先登录')</script>";
        echo "<script>window.location.href='$to'</script>";
    }
    
	?>
