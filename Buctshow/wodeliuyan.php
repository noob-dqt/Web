<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板-科比，我想对你说</title>
	<link rel="stylesheet" type="text/css" href="wodeliuyanxiugai2.css">
</head>
<body style="background-color: #99CCFF;">
	<?php

		// 删除
	session_start();
	$name=$_SESSION["admin"];
	$servername = "127.0.0.1:3306";
    $username = "root";
    $password = "123456";
    $dbname = "liuyanban";
	 $conn = new mysqli($servername, $username, $password, $dbname);
   if (isset($_GET['id']))
{
	 $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM liuyan WHERE id='$id'");
}
    // 修改
     $huifu=$_POST["HF"];
     $Rid=$_POST["RName"];
     if($huifu!=null){
     	mysqli_query($conn,"UPDATE liuyan SET comment='$huifu'
         WHERE id='$Rid' ");
     }
	?>
	<a href="liuyanbanindex.php" class="back">返回</a>
	<div class="bar1" ></div>
	<div class="bar1" id="bar"></div>
	<div id="liuyanban">我的留言</div>
	<?php
	 session_start();
	$name=$_SESSION["admin"];
	 $servername = "127.0.0.1:3306";
     $username = "root";
     $password = "123456";
     $dbname = "liuyanban";
	 $conn = new mysqli($servername, $username, $password, $dbname);
	 $result= mysqli_query($conn,"SELECT id,username,comment,reg_date FROM liuyan WHERE username='$name'");
	 $sql11="select * from mybd where username='$name' ";
	 $res11=mysqli_query($conn,$sql11);
	 $rw11=$res11->fetch_assoc();
	 $rww1=$rw11["image"];
	 $rww1=substr($rww1,10);
	 $rww1='images/'.$rww1;
		echo "<div class='LYB'>";
				while($row=mysqli_fetch_array($result)){
				   
					echo "<div class='LYbox'>";
					echo "<img src=$rww1 class='LYimg' style='margin-top:22px; margin-left:22px;'>";
					echo "<span class='UN' >{$row['username']}</span>";
					echo "<span class='time'>{$row['reg_date']}</span>";
					if($row['comment'][0]=='.'&&$row['comment'][1]=='/')
					{
						echo "<div class='LYcontest' style='
						   display:inline-block;
						'>
						<img  src='{$row['comment']}' style='

						border-radius: 0%;
                        width: 50px;
                        height: 50px;
						'>
						</div>
						";

					}else
					{
						echo "<div class='LYcontest'>{$row['comment']}</div>";
					}
					if(strcasecmp($name,$row['username'])== 0)
						{echo "<a method='get'  href='wodeliuyan.php?id={$row['id']}' class='Delete'>删除</a>";
					$Rname='HUIFU';
				}else{
					$Rname='HUIFU1';
				}
					
					
					echo "<div class='huifu1'>";
					echo "<form method='post' action='wodeliuyan.php'>
					 <input type='text' name='HF' id={$Rname}>
					 <input type='text' name='RName' value={$row['id']} id='RName'>
					<button id='HFbtn' type='submit'>修改</button></form>";
					echo "</div>";
                    echo "</div>";
                    
		        }
		        echo "</div>";

	    
?>
<?php
 $conn = new mysqli($servername, $username, $password,'liuyanban');
   if (isset($_GET['id']))
{
	 $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM liuyan WHERE id='$id'");
}

?>
</body>
</html>