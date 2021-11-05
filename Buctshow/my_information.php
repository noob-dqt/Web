<?php
	session_start();
	$search=$_SESSION["username"];
	include('PHP/connect.php');
	mysqli_select_db($conn,'liuyanban');
	$sql="select * from mybd where username='$search' or email='$search'";
	$res=mysqli_fetch_array(mysqli_query($conn,$sql));
	$user=$res["username"];
	$imgurl=$res["image"];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>my_message</title>
	<link type="text/css" rel="stylesheet" charset="UTF-8" href="CSS/css2.css">
	<!-- CSS -->
	<link rel="stylesheet" href="CSS/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="CSS/bootstrap-grid.min.css">
	<link rel="stylesheet" href="CSS/owl.carousel.min.css">
	<link rel="stylesheet" href="CSS/nouislider.min.css">
	<link rel="stylesheet" href="CSS/select2.min.css">
	<link rel="stylesheet" href="CSS/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="CSS/ionicons.min.css">
	<link rel="stylesheet" href="CSS/main.css">
	<style type="text/css">
		#salert{
		    background:#594954;
		    width: 60vh;
		    height: 30vh;
		    border-radius: 2vh;
		    border: solid white 1px;
		    opacity: 0.8;
		    position: absolute;
		    font-size: 4vh;
		    color: white;
		    text-align: center;
		    top: 35%;
		    left: 35%;
		    z-index: 999;
		    transition: 3.5s;
		    display: none;
		}
		#salert p{
		    margin: 0;
		    vertical-align:middle;
		    display: inline-block;
		    text-align:left;
		}
	</style>
</head>
<body>
	<div id="salert"><p id="sal_ct"></p></div>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-7 col-md-9 col-lg-8 col-xl-9">
					<div class="header__content">
						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->

						<!-- header logo -->
						<a href="index.php" class="header__logo">
							<img src="images/logo.jpg" alt="">
						</a>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="index.php" class="header__nav-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">首页</font></font></a>
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<!-- <li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuProjects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">北化留言板</font></font></a>
							</li> -->
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="yuexueindex.php" role="button" id="dropdownMenuJobs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">北化约学</font></font></a>

								
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="SecretWall.php" role="button" id="dropdownMenuCompanies" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">秘密墙</font></font></a>

							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="github.php" role="button" id="dropdownMenuProfiles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">北化github</font></font></a>

								
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="daohang.html" role="button" id="dropdownMenuPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">导航栏</font></font></a>

								
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header search -->
						<form action="#" class="header__search">
							<input class="header__search-input" type="text" placeholder="搜索...">
							<button class="header__search-button" type="button">
								<i class="icon ion-ios-search"></i>
							</button>
						</form>
						<!-- end header search -->
					</div>
				</div>

				<div class="col-5 col-md-3 col-lg-4 col-xl-3">
					<div class="header__content header__content--end">
						<!-- <a href="messages.html" class="header__messages header__messages--active">
							<i class="icon ion-ios-mail"></i>
						</a> -->


						<div class="header__profile">
							<a class="dropdown-toggle header__profile-btn" href="personaldata.php" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo'<img src="'.$imgurl.'" alt="">' ?>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo"$user" ?>
								</font></font></span>
							</a>

							<ul class="dropdown-menu dropdown-menu-right header__dropdown-menu header__dropdown-menu--right" aria-labelledby="dropdownMenuProfile">
								<li><a href="profile.html"><i class="icon ion-ios-settings"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 设定值</font></font></a></li>
								<li><a href="privacy.html"><i class="icon ion-ios-lock"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 隐私</font></font></a></li>
								<li><a href="faq.html"><i class="icon ion-ios-help-buoy"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 常问问题</font></font></a></li>
								<li><a href="#"><i class="icon ion-ios-exit"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 登出</font></font></a></li>
							</ul>
	
	</header>
	<div id="content">
		<div id="react-root" style="height: 100%; position: relative;">
		<!--	<div class="nav-bar"> 
				
			</div>-->

			<div class="page-container">
				<div class="page-wrapper">
					<div style="" class="avg-user-page">

						<div class="content-container" style="margin-top:0px;">
							<div class="avg-user-voice-page avg-content-block">
								<div class="page-tab-picker">
									<div class="avg-tab-picker side-tab-picker">
										<!-- <div class="avg-tab-item">
											<a href="my_message.html" class="avg-me-page"><span>我的留言</span></a> 
										</div> -->
										<div class="avg-tab-item active">
											<a href="#" class="avg-me-page"><span>修改个人信息</span></a> 
										</div> 
										<div class="avg-tab-item">
											<a href="my_password.php" class="avg-me-page"><span>修改帐户信息</span></a> 
										</div>
									</div> 
								</div>

								<div class="avg-list game-comment-list">
									<div class="page-content">
										<div class="avg-edit-user-info-form">
											<div class="form-body">
												<div class="info-line">
													<div class="info-title">UID：</div>
													<div class="info-content">
														<!-- <span class="uid">1234567</span> -->
													<!--	<span class="uid-copy">复制</span> -->
													</div> 
												</div>
												<div class="info-line">
													<div class="info-title">头像：</div>
													
													<form action="PHP/uploadimg.php" enctype="multipart/form-data"  method="post">
														<div class="info-content avatar-info">
														<div class="avatar-wrapper">
															<?php echo'<img class="avatar" src="'.$imgurl.'" alt="avatar">' ?>
															
															<div class="avatar-edit-button" onclick="uppic()">更改头像</div>
															<input type="file" id="file"  name="pic" style="display: none;"> 
														</div>
														<span class="tips">仅支持JPG、JPEG、PNG，且文件小于2MB,建议上传1:1的图片哦~</span> 
													</div>
													<button type="submit" style="background:#3796F6B3;border-radius:3px;opacity:0.7;">更改图片后点击此处上传</button>
													</form> 
												</div>
												<!-- <div class="info-line">
													<div class="info-title">昵称：</div>
													<div class="info-content">
														<input type="text" class="avg-input" value="昵称">
														<span class="username-input-tips  ">4/1-20</span> 
													</div> 
												</div> -->

												<div class="info-line">
													<div class="info-title">简介：</div>
													<div class="info-content">
														<textarea class="user-description" placeholder="简单说点什么介绍下自己吧~" id="introduction"></textarea>
														<span class="lenght-tips">输入小于20字的简介</span> 
													</div> 
												</div> 

											</div>
											<div class="form-footer" style="margin-left:100px;">
												<button class="avg-button avg-button-primary avg-button-default submit-button" type="button" onclick="upintro()">
													<span class="avg-button-text">保存</span> 
												</button> 
											</div> 
										</div> 
									</div> 
								</div>

								
<script src="JS/universaljs.js"></script>
<script src="JS/jquery.min.js"></script>
</body>
</html>

