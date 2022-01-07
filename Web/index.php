<?php
    session_start();
    $id='';
    $flag_admin='0';
    $id_name="";
    if(isset($_SESSION["id"])) 
    {
        $id=$_SESSION["id"];
        $flag_admin=$_SESSION["admin_flag"];
        $id_name=$_SESSION["username"];
    }
    if(isset($_POST["log_out"])){
        unset($_SESSION["id"]);
        unset($_SESSION["admin_flag"]);
        unset($_SESSION["username"]);
        unset($_POST["log_out"]);
    }
    include('PHP/get_notice.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUCT员工请假管理系统</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/infopage.css">
</head>
<body>
    <div class="mainbox">
        <div id="salert"><p id="sal_ct"></p></div>
        <div class="chart_box"></div>
        <div class="banner">
            <a href="index.php"><img src="images/logo.png" class="logo"></a>
            <?php
                if(isset($_SESSION["id"])){
                    echo '<div class="person_box">
                    欢迎登录，'.$id_name.'
                    <img src="images/headimg.jpg" class="img-circle headpart">
                    <ul class="personal_info">
                        <!-- <li>修改信息</li> -->
                        <li onclick="log_out()">退出登录</li>
                    </ul>
                </div>';
                }
                else{
                    echo '
                    <a class="btn btn-default login_btn" href="login.html" role="button">登录</a>
                    ';
                }
            ?> 
            
        </div>
        <div class="left_part">
            <div class="left_box"> 
                <form class="input_ntc_box">
                    <label>新的公告：</label>
                    <textarea class="new_ntc" cols="50" rows="15"></textarea>
                    <button class="btn btn-default pub_check_btn" type="button">发布</button>
                </form>
                <div class="r_bot">
                    <h2>公告</h2>
                    <h4><?php echo $ntc ?></h4>
                    <h5>发布人：<?php echo $puber ?></h5>
                    <h5>发布时间：<?php echo $pubtime ?></h5>
                </div>
                <form id="input_info_box">
                    <label>请假类型：</label>
                    <input type="text" list="carsname" id="vac_type">
                    <datalist id="carsname">
                        <option>事假</option>
                        <option>病假</option>
                        <option>出差</option>
                        <option>带薪休假</option>
                    </datalist>
                    <label>起始日期：</label>
                    <input type="date" id="date_beg">
                    <label>结束日期：</label>
                    <input type="date" id="date_end">
                    <label>请假原因：</label>
                    <textarea id="reason" cols="30" rows="5"></textarea>
                    <button class="btn btn-default" type="button" id="apply_btn">申请</button>
                </form>
                
            </div>
        </div>
        <div class="right_part">
            <div class="r_top">
                <div class="r_ntc">
                    <p>疫情期间做好个人防护，非必要不出京，请假请说明请假原因</p>
                </div>
            </div>
            <div class="info_box">
                    <?php
                        if($id=='') echo '<h3>请先登录</h3>';
                        //管理员和员工稍有区别
                        else {
                            echo'
                                <div class="query_box">
                                    <a class="btn btn-default" href="personal_rec.php" role="button">查询请假记录</a>
                            ';
                            if($flag_admin>='1')
                            echo '
                                    <a class="btn btn-default change_pub" role="button">更改公告</a>
                                    <a class="btn btn-default" href="all_rec.php" role="button">全体员工请假记录</a>
                                    <a class="btn btn-default" href="approve.php" role="button">员工审批</a>
                                    <a class="btn btn-default data_bak" href="PHP/db_bak.php" role="button">数据备份</a>
                                ';
                            echo '
                                    <a class="btn btn-default app_btn" role="button" onclick="apply_vac()">申请假期</a>
                                ';
                            if($flag_admin>='1')
                            echo'
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle cnt_btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    统计信息                    
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li role="separator" class="divider"></li>
                                <li><a class="year_rec">按年份统计</a></li>
                                <li><a class="mon_rec">按月份统计</a></li>
                                <li><a class="emp_rec">按员工统计</a></li>
                                <li><a class="dep_rec">按部门统计</a></li>
                                <li><a class="tp_rec">按请假类型统计</a></li>
                                <li><a class="cnt_rec">按累计天数统计</a></li>
                                </ul>
                            </div>
                            ';
                            if($flag_admin>='1')
                            echo '
                                <a class="btn btn-default" href="admin.php" role="button">后台管理</a>
                            ';
                            echo'
                                </div>
                            ';
                        }
                    ?>   
            </div>

        </div>
    </div>
</body>
<script src="JS/jquery.min.js"></script>
<script src="JS/chart.js"></script>
<script src="JS/index.js"></script>
<script src="JS/universal.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/front.min.js"></script>
</html>