<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>北化微show</title>
	<link rel="stylesheet" type="text/css" href="index18.css">

</head>
<body style="background-color: #99CCFF;color: color:#336699;">
	<?php		
	session_start();

	$name=$_SESSION["username"];
	$_SESSION["username"]=$name;
// $name="test";
	$servername = "127.0.0.1:3306";
    $username = "root";
    $password = "123456";
    $dbname = "liuyanban";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql1="select * from mybd where username='$name'  ";
	$res1=mysqli_query($conn,$sql1);
	$rw1=$res1->fetch_assoc();
	$rww=$rw1["image"];
	$rww=substr($rww,9);
	$rww='images/'.$rww;
  if (isset($_GET['id']))
{
	 $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM liuyan WHERE id='$id'");
}
     $comment=$_POST["cmt"];
     if($name!=null)
     {


     if($comment!=null){
     	$sql_insert = "INSERT INTO liuyan (username, comment)
                        VALUES ('$name', '$comment')";
        $res_insert = $conn->query($sql_insert);
     }
    
     $huifu=$_POST["HF"];
     $Rid=$_POST["Rname"];
     if($huifu!=null){
     	$sql_insert = "INSERT INTO liuyanhuifu (id,username, huifu)
                        VALUES ('$Rid','$name', '$huifu')";
        $res_insert = $conn->query($sql_insert);
     }
    }

	?>



	<div class="a">
		
<div id="top">
		<div id="t-top">
			<div id="title">
				<img src="images/北化微shoW.jpg">
			</div>
		<!-- 	<div id="login">
				<div class="font">
					<a href="login.php">登录</a>
				</div>
				<div class="font">
					<a href="register.html">注册</a>
				</div>
			</div> -->
		</div>
		<div id="daohang">
			<ul>
				<li >
					<a href="index.html">主页</a>
				</li>
				<li style="background-color: #313e84;">
					<a href="liuyanbanindex.php">朋友圈</a>
				</li>
				<li>
					<a href="daohang.html">导航栏</a>
				</li>
			</ul>
		</div>
		</div>
	</div>

	<div class="body" style="background-color: #99CCFF;">
		<div >
			<div class="write">
				<div class="word" style="color:#336699;">北化人<br>北化魂<br>在留言板留言的都是人上人</div>
				
			</div>

			<div class="liuyan" style="background-color: #99CCFF;">
				<form method="post" action="./uploadmsg.php">
					<textarea style="background-color: white; color:#336699;" cols="40" rows="5" name="cmt" placeholder="在此留言"></textarea> 
					<br>
                     <button style="background-color: white; color:#336699;" type="submit" class="submit">发布</button>
				</form>
				<form action="./uploadimg.php" enctype="multipart/form-data" method="post">
					<input type="file" name="pic" style=" color:#336699;border-radius: 5px;
  border-width: 0px;outline-style: none ;
    border: 0px;margin-left:170px;">
					<button type="submit" style=" color:#336699;border-radius: 5px;
  border-width: 0px;">发布图片</button>
			    </form>
			</div>
		</div>
		<div class="user" style="background-color: white; color:#336699;border:3px solid #ffffff;">
			 <?php	    
			 if($name!=null)
			 {
			 echo   "
			<img src=$rww id='tx' style='margin-top: 100px; border:4px solid #336699;' >
			<div  style='color: #336699;'>
			       {$_SESSION["username"]}
			        </div>
		            <a href='PHP/person-info.php' id='WDLY' style='color: #336699;'>我的主页</a> <br>
			        <a href='wodeliuyan.php' id='WDLY' style='color: #336699;'>我的留言</a> <br>
                    <a href='login.html' id='dengchu' style='color: #336699;''>登录</a>";
              }else
              {
              	  echo "<a href='login.html' id='dengchu1' style='color: #336699;font-size:36px;display:block;margin-top:200px;'>请登录</a>";
              }
			 ?>
		</div>
	</div>
	<div class="bar1" ></div>
	<div class="bar1" id="bar"></div>
	<div id="liuyanban">留言板</div>
	<?php
	  $every_page = 8;
	 $servername = "127.0.0.1:3306";
     $username = "root";
     $password = "123456";
     $dbname = "liuyanban";
	 $conn = new mysqli($servername, $username, $password, $dbname);
	 // 最大页码
	 $table_name="liuyan";
	 $total_sql="select count(*) from $table_name";
     $total_result =mysqli_query($conn,$total_sql);
     $total_row=mysqli_fetch_row($total_result);
     $total = $total_row[0];//获取最大页码数
     $total_page = ceil($total/$every_page);//向上整数
	 // 分页
	 $page = (!empty($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1; 
 
     $strat = ($page - 1) * $every_page;
	 $sql = "SELECT  * FROM liuyan ORDER BY reg_date DESC limit {$strat}, {$every_page}";
     $result = $conn->query($sql);
  
     session_start();
	 $name=$_SESSION["admin"];
		echo "<div class='LYB'>";
				while($row=$result->fetch_assoc()){
				   $rrw=$row["username"];
				   $sql11="select * from mybd where username='$rrw' ";
	               $res11=mysqli_query($conn,$sql11);
	               $rw11=$res11->fetch_assoc();
	               $rww1=$rw11["image"];
	               $rww1=substr($rww1,10);
	               $rww1='images/'.$rww1;
					echo "<div class='LYbox'>";
					echo "<img src='$rww1' class='LYimg' style='margin-top:22px; margin-left:22px;'>";
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
						{echo "<a method='get'  href='uploadmsg.php?id={$row['id']}' class='Delete' style='color: #219be6;' >删除</a>";
					$Rname='HUIFU';
				}else{
					$Rname='HUIFU1';
				}
					echo "<div class='huifu1'>";
					echo "<form method='post' action='uploadmsg.php'>
					 <input type='text' name='HF' id={$Rname}>
					 <input type='text' name='Rname' value={$row['id']} id='Rname'>
					<button id='HFbtn' type='submit'>回复</button></form>";
					echo "</div>";
                    echo "</div>";
                    echo "<div class='huifu'>";
                    $result1 = mysqli_query($conn,"SELECT id,username,huifu FROM liuyanhuifu
                      WHERE id={$row['id']}");
                    while($row1 = mysqli_fetch_array($result1))
                      {
                          echo "<div class='HFbox'>";
                          echo "<span class='RNM'>{$row1['username']}:</span>";
                          echo "<span class='RHF'>{$row1['huifu']}</span>";
                          echo "</div>";;
                        }
                    echo "</div>";
		        }
		        echo "<div class='PGbox'>";
		        for($i=1;$i<=$total_page;$i++){
                    if($i==$page){//当前页为显示页时加背景颜色
                      echo "<a  class='ZD' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                  }else{
                      echo "<a  class='BZD' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                  }
                }
                echo "</div>";
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