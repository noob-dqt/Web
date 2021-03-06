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

<html lang="zh-CN" class="translated-ltr"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="CSS/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="CSS/bootstrap-grid.min.css">
	<link rel="stylesheet" href="CSS/owl.carousel.min.css">
	<link rel="stylesheet" href="CSS/nouislider.min.css">
	<link rel="stylesheet" href="CSS/select2.min.css">
	<link rel="stylesheet" href="CSS/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="CSS/ionicons.min.css">
	<link rel="stylesheet" href="CSS/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>buctshow</title>
<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css"></head>



<body>



	<!-- header -->
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
							<img src="img/logo.jpg" alt="">
						</a>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="index.php" class="header__nav-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a>
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<!-- <li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuProjects" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">???????????????</font></font></a>
							</li> -->
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="yuexueindex.php" role="button" id="dropdownMenuJobs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a>

								
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="SecretWall.php" role="button" id="dropdownMenuCompanies" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">?????????</font></font></a>

							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="github.php" role="button" id="dropdownMenuProfiles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????github</font></font></a>

								
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="dropdown-toggle header__nav-link" href="daohang.html" role="button" id="dropdownMenuPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">?????????</font></font></a>

								
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header search -->
						<form action="#" class="header__search">
							<input class="header__search-input" type="text" placeholder="??????...">
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
							<?php
								if($user){
									echo'<a class="dropdown-toggle header__profile-btn" href="personaldata.php" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img src="'.$imgurl.'" alt="">
										<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$user.'</font></font></span></a>
									';
								}
							?>
							<ul class="dropdown-menu dropdown-menu-right header__dropdown-menu header__dropdown-menu--right" aria-labelledby="dropdownMenuProfile">
								<li><a href="profile.html"><i class="icon ion-ios-settings"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ?????????</font></font></a></li>
								<li><a href="privacy.html"><i class="icon ion-ios-lock"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ??????</font></font></a></li>
								<li><a href="faq.html"><i class="icon ion-ios-help-buoy"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ????????????</font></font></a></li>
								<li><a href="#"><i class="icon ion-ios-exit"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ??????</font></font></a></li>
							</ul>
	
	</header>
	<!-- end header -->

	<!-- main content -->
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-5 col-lg-4 col-xl-3">
					<!-- user -->
					<div class="user">
						<div class="user__head">
							<div class="user__img">
								<!-- <img src="img/headimg.jpg" alt=""> -->
								<?php echo'<img src="'.$imgurl.'" alt="">' ?>
							</div>
						</div>
						<div class="user__title">
							<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo"$user" ?></font></font></h2>
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
						</div>
						<div class="user__btns">
							<a href="#" class="user__btn user__btn--blue"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span></a>
							<a href="personaldata.php" class="user__btn user__btn--orange"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span></a>
						</div>
						<ul class="user__stats">
							<li>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">26</font></font></span>
							</li>
							<li>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">?????????</font></font></p>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">88</font></font></span>
							</li>
						</ul>
						<a href="profile.html" class="sidebox__more"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a>
					</div>
					<!-- end user -->

					<!-- sidebox -->
					<div class="sidebox">
						<h4 class="sidebox__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></h4>
						<div class="sidebox__content">
							<div class="sidebox__user">
								<a href="#" class="sidebox__user-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="sidebox__user-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">user</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								</div>
								<button class="sidebox__user-btn" type="button">
									<i class="icon ion-ios-add"></i>
								</button>
							</div>

							<div class="sidebox__user">
								<a href="#" class="sidebox__user-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="sidebox__user-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">dwds</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								</div>
								<button class="sidebox__user-btn" type="button">
									<i class="icon ion-ios-add"></i>
								</button>
							</div>

							<div class="sidebox__user">
								<a href="#" class="sidebox__user-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="sidebox__user-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ddwdw</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								</div>
								<button class="sidebox__user-btn" type="button">
									<i class="icon ion-ios-add"></i>
								</button>
							</div>

							<div class="sidebox__user">
								<a href="#" class="sidebox__user-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="sidebox__user-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">dwddwwd</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								</div>
								<button class="sidebox__user-btn" type="button">
									<i class="icon ion-ios-add"></i>
								</button>
							</div>

							<div class="sidebox__user">
								<a href="#" class="sidebox__user-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="sidebox__user-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">wsws</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></p>
								</div>
								<button class="sidebox__user-btn" type="button">
									<i class="icon ion-ios-add"></i>
								</button>
							</div>
						</div>
						<a href="#" class="sidebox__more"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a>
					</div>
					<!-- end sidebox -->
				</div>

				<div class="col-12 col-md-7 col-lg-8 col-xl-6" id="mainn" > 

					<div class="post">
						<div class="post__head">
							
							<div class="post__head-title">
								<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 26px;">????????????</font></font></a></h5>
								<!-- <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11?????????</font></font></p> -->
							</div>

							<!-- <div class="post__dropdown">
								<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon ion-md-more"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
								</ul>
							</div> -->
						</div>

						<!-- <div class="post__wrap">
							<div class="post__company">
								<i class="icon ion-ios-briefcase"></i>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Envato</font></font></span>
							</div>

							<div class="post__location">
								<i class="icon ion-ios-navigate"></i>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span>
							</div>

							<div class="post__actions">
								<a class="post__actions-btn post__actions-btn--green" href="#">
									<i class="icon ion-ios-bookmark"></i>
								</a>
								<a class="post__actions-btn post__actions-btn--red" href="#">
									<i class="icon ion-ios-mail"></i>
								</a>
							</div>
						</div> -->

						<!-- <h2 class="post__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????Wordpress????????????</font></font></h2>
 -->                 
						<!-- <br> -->
						<!-- <br> -->
						<div class="post__options">
							<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">?????????</font></font></span>
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="" name="" style="border-radius:10px;width:150px;" ></font></font></p>
							&nbsp;
							&nbsp;
							&nbsp;
							&nbsp;
						<!-- 	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></span>
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="" style="border-radius:10px;width:70px;"name="" placeholder="????????????"></font></font></p> -->
						</div>
                        <!-- <br> -->
						<div class="post__description">
							<textarea style="border-width: 0;background-color: #fafafa; border-radius: 5px;" cols="70" rows="7" name="cmt"  placeholder="??????????????????"></textarea> 
							<!-- <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lorem Ipsum????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</font><font style="vertical-align: inherit;">???????????????Lorem Ipsum?????????????????????????????????????????????????????????????????????????????????</font></font></p> -->
							<!-- <a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a> -->
						</div>
                        <!-- <div class="user__btns"> -->
							<!-- <div onclick="creatdiv()" href="" class="user__btn user__btn--blue" style="margin-left:300px;"> --><form action="upload.php" method="post" enctype="multipart/form-data">
	<input   type="file" name="pic" id="pic"><input type="submit" name="submit" value="??????">
</form><!-- </div> -->
							
						<!-- </div> -->
						<!-- <div class="post__tags">
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HTML </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CSS </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PHP</font></font></a>
						</div>

						<div class="post__stats">
							<div>
								<a class="post__likes" href="#"><i class="icon ion-ios-heart"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15</font></font></span></a>
								<a class="post__comments" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1"><i class="icon ion-ios-text"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span></a>
							</div>

							<div class="post__views">
								<i class="icon ion-ios-eye"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">214</font></font></span>
							</div> -->
						<!-- </div> -->

						<!-- <div class="collapse post__collapse" id="collapse1">
							<form action="#" class="post__form">
								<input type="text" placeholder="??????????????????...">
								<button type="button"><i class="icon ion-ios-paper-plane"></i></button>
							</form>
						</div> -->
					</div>
					<!-- post -->
					<div id='ddd'>

<?php

 $i= 0; 
$cars=array("2021???9???30???","2021???9???29???","2021???9???28???","2021???9???27???","2021???9???26???","2021???9???25???","2021???9???24???","2021???9???23???","2021???9???22???");
$des=array("c???????????????????????????","c??????????????????","??????????????????????????????????????????","C??????????????????");
$nnum=array("12","22","32","45");
$path='upload';//??????
    if ($handle = opendir($path))//??????????????????
    {
        while (false !== ($file = readdir($handle)))//?????????????????????????????????????????????$file
        {
            if ($file != "." && $file != "..")//?????????????????????????????????
            {
                if (is_dir($path."/".$file))
                {
//                    echo $path.": ".$file."<br>";//????????????????????????????????????????????????
                    file_list($path."/".$file);
                }
                else
                {
                	echo '	<div class="post"  >
						<div class="post__head">
							<a href="#" class="post__head-img">
								<img src="img/headimg.jpg" alt="">
							</a>
							<div class="post__head-title">
								<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$user.'</font></font></a></h5>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$cars[$i].' </font></font></p>
							</div>

							<div class="post__dropdown">
								<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon ion-md-more"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
								</ul>
							</div>
						</div>

						

						<div class="post__options">
							<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><div >'.$file.'

                	</div></font></font></span>
							
						</div>

						<div class="post__description">
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$des[$i].'</font></font></p>
							<a href="./down.php?act='.$file.'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a>
						</div>

					

						<div class="post__stats">
							
							<div class="post__views">
								<i class="icon ion-ios-eye"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$nnum[$i].'</font></font></span>
							</div>
						</div>

						<div class="collapse post__collapse" id="collapse1">
							<form action="#" class="post__form">
								<input type="text" placeholder="??????????????????...">
								<button type="button"><i class="icon ion-ios-paper-plane"></i></button>
							</form>
						</div>
					</div>';
                   // echo $file."<br>";
					if($i<3)
					   $i++;
                }
            }
        }
    }

 ?>
				
					<!-- end post -->

					<!-- post -->
<!-- 					<div class="post">
						<div class="post__head">
							<a href="#" class="post__head-img">
								<img src="img/headimg.jpg" alt="">
							</a>
							<div class="post__head-title">
								<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">wvweew
								</font></font></a></h5>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24?????????</font></font></p>
							</div>

							<div class="post__dropdown">
								<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon ion-md-more"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu3">
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
								</ul>
							</div>
						</div> -->

						<!-- <div class="post__wrap">
							<div class="post__company">
								<i class="icon ion-ios-briefcase"></i>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????????????????</font></font></span>
							</div>

							<div class="post__actions">
								<a class="post__actions-btn post__actions-btn--green" href="#">
									<i class="icon ion-ios-bookmark"></i>
								</a>
								<a class="post__actions-btn post__actions-btn--red" href="#">
									<i class="icon ion-ios-mail"></i>
								</a>
								<a href="#" class="post__actions-btn post__actions-btn--blue"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span></a>
							</div>
						</div> -->

						<!-- <h2 class="post__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PSD?????????HTML</font></font></h2>
 -->
			<!-- 			<div class="post__options">
							<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span>
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16:00-19:00</font></font></p>
						</div>

						<div class="post__description">
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????????????????????????????</font></font></p>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a>
						</div>
 -->
					<!-- 	<div class="post__tags">
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HTML </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CSS </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">JS </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PSD</font></font></a>
						</div> -->
<!-- 
						<div class="post__stats">
							<div>
								<a class="post__likes" href="#"><i class="icon ion-ios-heart"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15</font></font></span></a>
								<a class="post__comments" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse1"><i class="icon ion-ios-text"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span></a>
							</div>

							<div class="post__views">
								<i class="icon ion-ios-eye"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">214</font></font></span>
							</div>
						</div>

						<div class="collapse post__collapse" id="collapse3">
							<form action="#" class="post__form">
								<input type="text" placeholder="??????????????????...">
								<button type="button"><i class="icon ion-ios-paper-plane"></i></button>
							</form>
						</div>
					</div> -->
					<!-- end post -->

					<!-- post -->
		<!-- 			<div class="post">
						<div class="post__head">
							<a href="#" class="post__head-img">
								<img src="img/headimg.jpg" alt="">
							</a>
							<div class="post__head-title">
								<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">dwdwdw</font></font></a></h5>
								<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">45?????????</font></font></p>
							</div>

							<div class="post__dropdown">
								<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon ion-md-more"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu2">
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
									<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????</font></font></a></li>
								</ul>
							</div>
						</div>
 -->
					<!-- 	<div class="post__wrap"> -->
							<!-- <div class="post__company">
								<i class="icon ion-ios-briefcase"></i>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Beijing</font></font></span>
							</div>

							<div class="post__location">
								<i class="icon ion-ios-navigate"></i>
								<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">China</font></font></span>
							</div>
 --><!-- 
							<div class="post__actions">
								<a class="post__actions-btn post__actions-btn--green" href="#">
									<i class="icon ion-ios-bookmark"></i>
								</a>
								<a class="post__actions-btn post__actions-btn--red" href="#">
									<i class="icon ion-ios-mail"></i>
								</a>
							</div>
						</div>
 -->
						<!-- <h2 class="post__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??????Wordpress????????????</font></font></h2>
 --><!-- 
						<div class="post__options">
							<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">?????????</font></font></span>
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11???00-12???00</font></font></p>
						</div> -->

				<!-- 		<div class="post__description">
							<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????????????????????????????</font></font></p>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></a>
						</div>
 -->
						<!-- <div class="post__tags">
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HTML </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CSS </font></font></a>
							<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PHP</font></font></a>
						</div>
 --><!-- 
						<div class="post__stats">
							<div>
								<a class="post__likes" href="#"><i class="icon ion-ios-heart"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15</font></font></span></a>
								<a class="post__comments" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapse2"><i class="icon ion-ios-text"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></span></a>
							</div> -->

<!-- 							<div class="post__views">
								<i class="icon ion-ios-eye"></i> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">214</font></font></span>
							</div>
						</div> -->

				<!-- 		<div class="collapse show post__collapse" id="collapse2">
							<form action="#" class="post__form">
								<input type="text" placeholder="??????????????????...">
								<button type="button"><i class="icon ion-ios-paper-plane"></i></button>
							</form>

							<div class="post__comment">
								<a href="#" class="post__comment-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="post__comment-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">sonee</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20?????????</font></font></p>
								</div> -->
<!-- 
								<p class="post__comment-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????????????????????????????</font></font></p>
							</div> -->

				<!-- 			<div class="post__comment">
								<a href="#" class="post__comment-img">
									<img src="img/headimg.jpg" alt="">
								</a>
								<div class="post__comment-title">
									<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">veeww</font></font></a></h5>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22?????????</font></font></p>
								</div>

								<p class="post__comment-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????????????????????????????</font></font></p>
							</div>
						</div>
					</div>
				    </div> -->
					<!-- end post -->

					<!-- view more -->
					<button class="main__btn" type="button"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????????????</font></font></span></button>
					<!-- end view more -->
				</div>

				
			</div>
		</div>
	</main>
	<!-- end main content -->

	
	<!-- JS -->
	<script src="JS/jquery-3.4.1.min.js"></script>
	<script src="JS/bootstrap.bundle.min.js"></script>
	<script src="JS/owl.carousel.min.js"></script>
	<script src="JS/wNumb.js"></script>
	<script src="JS/nouislider.min.js"></script>
	<script src="JS/select2.min.js"></script>
	<script src="JS/jquery.mousewheel.min.js"></script>
	<script src="JS/jquery.mCustomScrollbar.min.js"></script>
	<script src="JS/main.js"></script>
	<script src="JS/index.js"></script>
</body>
</html>