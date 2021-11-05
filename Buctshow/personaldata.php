<?php
	session_start();
	$search=$_SESSION["username"];
	include('PHP/connect.php');
	mysqli_select_db($conn,'liuyanban');
	$sql="select * from mybd where username='$search' or email='$search'";
	$res=mysqli_fetch_array(mysqli_query($conn,$sql));
	$user=$res["username"];
	$imgurl=$res["image"];
	$info=$res["introduction"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>myself</title>
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

</head>
<body>
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
				


						<div class="header__profile">
							<a class="dropdown-toggle header__profile-btn" href="personaldata.php" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<!-- <img src="image/headimg.jpg" alt=""> -->
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
			<div class="full-width-page-background">
					<div id="avg-user-page-background-1" class="bg-1"></div>
					<div id="avg-user-page-background-2" style="height: 266px;"></div> 
				</div>
			<div class="page-container">
				<div class="page-wrapper">
					<div style="" class="avg-user-page">
						<div class="page-header">
							<div class="avatar-image avatar-image-border user-avatar">
								<?php echo'<img class="avatar-img" src="'.$imgurl.'" alt="">' ?> 
								<img class="avatar-border-img" src="images/headborder.png" alt="avatar">
							
							</div>
							<div class="user-info">
								<div class="user-name"><?php echo"$user" ?></div> 
									</div>
							<div class="user-description"><?php 
							if($info) echo"$info";
							else echo"写下你的简介吧~";
							  ?></div>
							<div class="user-count-info">
								<div class="count-info">
									<div class="count">0</div>
									<div class="title">关注</div></div>
								<div class="count-info">
									<div class="count">1</div>
									<div class="title">粉丝</div></div>
								<div class="count-info">
									<div class="count">0</div>
									<div class="title">获赞</div></div> 
								</div>
					    
						</div>
						<div class="content-container" style="margin-top:100px;">
							<div class="avg-user-voice-page avg-content-block">
								<div class="page-tab-picker">
									<div class="avg-tab-picker side-tab-picker">
										<div class="avg-tab-item">
											<a href="my_information.php" class="avg-me-page"><span>修改个人信息</span></a> 
										</div> 
										<div class="avg-tab-item">
											<a href="my_password.php" class="avg-me-page"><span>修改帐户信息</span></a> 
										</div>
									</div> 
								</div>
								<div class="avg-list game-comment-list">
									<ul> 
										<li class="avg-list-line"> 


										</li>

									</ul>
									<div class="avg-load-more-footer list-load-more">
										<div style="" class="no-more-data-tips">没有更多数据了~</div> 
									</div> 
								</div>

</body>
</html>

