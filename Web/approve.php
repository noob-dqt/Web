<?php
    session_start();
    if(!isset($_SESSION["id"])){
        echo "<script>alert('请先登录再访问本页面！');window.location.href='index.php'</script>";
    }
    $id=$_SESSION["id"];
    $flag_admin=$_SESSION["admin_flag"];
    if($flag_admin==0){
        echo "<script>alert('权限不足！');window.location.href='index.php'</script>";
    }

    $flag=0;
    if(isset($_POST["search_text"]))
    {
        setcookie("search2",$_POST["search_text"],time()+3600);     //一小时
    }
    if(isset($_COOKIE["search2"])){
        if($_COOKIE["search2"]!="search_false"){
            $flag=1;
            $keyword=$_COOKIE["search2"];
            // echo "final:".$keyword;
        }
    }
    include('PHP/connect.php');
    $conn->select_db("emp_ms");
    $sql="SELECT * FROM info,emp WHERE emp.mid='$id' AND emp.id=info.empid AND conf=0";
    
    if($flag==1){
        $sql="SELECT * FROM info,emp WHERE emp.mid='$id' AND emp.id=info.empid AND conf=0 AND (info.empid='$keyword' or info.type='$keyword' or info.date LIKE '%$keyword%')";
    }
    $res=$conn->query($sql);
    if(!$res)
        echo "<script>alert('服务器出错！');window.location.href='index.php'</script>";
    $maxlen=10;     //单页最大十条
    $maxpg=floor((($res->num_rows==0?1:$res->num_rows)-1)/$maxlen);   //最大页号
    // echo "<script>alert($res->num_rows)</script>";
    $pg=0;
    if(isset($_GET["page"])){
        $pg=$_GET["page"];
    }
    $rowbg=$pg*$maxlen;
    $sql="SELECT emp.name,info.* FROM info,emp WHERE emp.mid='$id' AND emp.id=info.empid AND conf=0 order by date ASC,id ASC limit $rowbg,$maxlen";//取出一页的数据   
    if($flag==1){
        $sql="SELECT emp.name,info.* FROM info,emp WHERE emp.mid='$id' AND emp.id=info.empid AND conf=0 AND (info.empid='$keyword' or info.type='$keyword' or info.date LIKE '%$keyword%') order by date ASC,id ASC limit $rowbg,$maxlen";
    }
    $res=$conn->query($sql);
    $actlen=$res->num_rows;
    // echo "<script>alert($actlen)</script>";
    if(!$res)
        echo "<script>alert('服务器出错！');window.location.href='index.php'</script>";
    $rows=$res->fetch_all();
    include('PHP/get_notice.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>审批</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/infopage.css">
    <style>
        .r_bot{
            width: 60%;
            height: 45%;
            color: #444242;
            margin: auto;
            margin-top: 15%;
        }
    </style>
</head>
<body>
    <div class="mainbox">
        <div id="salert"><p id="sal_ct"></p></div>
        <div class="banner">
            <a href="index.php" class="btn btn-default ret_btn reset_ret_btn">返回</a>
            <a href="index.php"><img src="images/logo.png" class="logo"></a>
            <?php
                if(isset($_SESSION["id"])){
                    echo '<div class="person_box">'.$_SESSION["username"].'
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
                <div class="sear_box"><a><span class="sear_box_0 glyphicon glyphicon-search se_ico"></span></a><input type="text" class="search_inp" placeholder="搜索工号/类型/请假日期"><div class="reset_btn">重置</div></div>
                <div class="info_box">
                    <?php
                        for($i=0;$i<$actlen;$i++){
                            echo'
                            <p class="id_num num'.$i.'">'.$rows[$i][1].'</p>
                            <div class="reason_box box'.$i.'">
                                <span aria-hidden="true" class="shut_btn">X</span>
                                <p>'.$rows[$i][8].'</p>
                            </div>
                            ';
                        }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>申请人</th>
                            <th>工号</th>
                            <th>申请时间</th>
                            <th>类型</th>
                            <th>开始日期</th>
                            <th>结束日期</th>
                            <th>总天数</th>
                            </tr>
                        </thead>
                        <?php
                            for($i=0;$i<$actlen;$i++){
                                $pla=$i+1;
                                echo'
                                <tbody>
                                    <tr>
                                    <th scope="row">'.$pla.'</th>
                                    <td>'.$rows[$i][0].'</td>
                                    <td>'.$rows[$i][2].'</td>
                                    <td>'.$rows[$i][3].'</td>
                                    <td>'.$rows[$i][4].'</td>
                                    <td>'.$rows[$i][5].'</td>
                                    <td>'.$rows[$i][6].'</td>
                                    <td>'.$rows[$i][7].'</td>
                                    <td class="check_detail">查看原因</td>
                                    <td class="btn btn-default pass_req">通过</td>
                                    </tr>
                                </tbody>
                                ';
                            }
                        ?>
                    </table>
                    <a href="?page=<?php echo $pg-1<0?0:$pg-1;?>" class="btn btn-default ret_btn">上一页</a>
                    <a href="?page=<?php echo $pg+1>$maxpg?$maxpg:$pg+1;?>" class="btn btn-default ret_btn">下一页</a>
                </div>
            </div>
        </div>
        <div class="right_part">
            <div class="r_top">
                <div class="r_ntc">
                    <p>疫情期间做好个人防护，非必要不出京，请假请说明请假原因</p>
                </div>
            </div>
            <div class="r_bot">
                <h2>公告</h2>
                <h4><?php echo $ntc ?></h4>
                <h5>发布人：<?php echo $puber ?></h5>
                <h5>发布时间：<?php echo $pubtime ?></h5>
            </div>
        </div>
    </div>
</body>
<script src="JS/jquery.min.js"></script>
<script src="JS/index.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/front.min.js"></script>
</html>