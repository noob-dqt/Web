<?php
	session_start();
	$search=$_SESSION["username"];
	include('PHP/connect.php');
	mysqli_select_db($conn,'liuyanban');
	$sql="select * from mybd where username='$search' or email='$search'";
	$res=mysqli_fetch_array(mysqli_query($conn,$sql));
	$user=$res["username"];
	$imgurl=$res["image"];
	// echo "$search";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/css.css">
	<link rel="stylesheet" type="text/css" href="CSS/recss.css">
<!-- 	<meta name="viewport" content="user-scalable=no, width=device-width" /> -->
	<meta charset="utf-8">
	<title>北化微show</title>
	<style type="text/css">
		#zz a{
			color: white;
		}
		#zz a:hover{
			color: red;
		}
		#outlog{
			float: right;
		}
	</style>
</head>
<body>
	<div id="salert"><p id="sal_ct"></p></div>
	<div id="top">
		<div id="t-top">
			<div id="title">
				<img src="images/北化微shoW.jpg">
			</div>
		</div>
		<div id="daohang">
			<ul>
				<li>
					<a href="index.php">主页</a>
				</li>
				<li>
					<a href="yuexueindex.php">北化约学</a>
				</li>
				<li>  
					<a href="github.php">北化Github</a>
				</li>
				<li>
					<a href="SecretWall.php">秘密墙</a>
				</li>
				<li>
					<a href="daohang.html">导航栏</a>
				</li>

				<?php
					if($user!=""){
						echo '<li style="margin-left:40vh;" >
					<a href="personaldata.php">'.$user.'</a>
				</li>';
						echo '<li onclick="lgout()" id="outlog"><a href="#">注销</a></li>';
					}
					else{
						echo'<li style="margin-left:40vh;">
					<a href="login.html">登录</a>
				</li>';
					}
				?>
				
			</ul>
		</div>
	</div>
	<div id="lunbo">
		<div id="pic">
			<div class="no">
				<img src="images/img1.jpg">
			</div>
			<div class="no">
				<img src="images/img2.jpg">
			</div>
			<div class="no">
				<img src="images/img3.jpg">
			</div>
			<div class="no">
				<img src="images/img4.jpg">
			</div>
		</div>
		<div id="dianji">
			<div class="kuai" onclick ="play(0)"></div>
			<div class="kuai" onclick ="play(1)"></div>
			<div class="kuai" onclick ="play(2)"></div>
			<div class="kuai" onclick ="play(3)"></div>
		</div>
	</div>
	<div id="tongzhi">
		<div id="tt">
			<p>通&nbsp;知&nbsp;公&nbsp;告</p>
		</div>
		<div id="light"></div>
		<div class="thing">
			<div class="biaoti">
				北化微show开通了！
			</div>
			<div class="ligg"></div>
			<div class="neirong">
				&nbsp;&nbsp;&nbsp;&nbsp;北化微show开通了！北化微show开通了！北化微show开通了！北化微show开通了！北化微show开通了！北化微show开通了！北化微show开通了！北化微show开通了！
			</div>
		</div>
		<div class="thing">
			<div class="biaoti">
				用户须知
			</div>
			<div class="ligg"></div>
			<div class="neirong">
				&nbsp;&nbsp;&nbsp;&nbsp;秘密墙功能不会记录任何个人信息，所有信息均匿名
			</div>
		</div>
	</div>
	<div id="bottom">
		<div id="zi">		
			<div id="zz">
				<a href="http://beian.miit.gov.cn">京ICP备2021030482号</a>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="JS/js.js"></script>
<script type="text/javascript" src="JS/universaljs.js"></script>
<script type="text/javascript" src="JS/jquery.min.js"></script>
</html>