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
    if($flag_admin!='2'){
        echo "<script>alert('权限不足');window.location.href='index.php'</script>";
    }  
    //判断搜索*******
    $flag=0;    //搜索标志
    if(isset($_POST["search_text"]))
    {
        setcookie("search2",$_POST["search_text"],time()+3600);     //一小时
    }
    if(isset($_COOKIE["search2"])){
        if($_COOKIE["search2"]!="search_false"){
            $flag=1;
            $keyword=$_COOKIE["search2"];
        }
    }  
    //***************处理分页、搜索
    include('PHP/connect.php');
    $conn->select_db("emp_ms");
    $sql="select *from dept";
    if($flag==1){
        $sql="select *from dept WHERE depid='$keyword' OR pname LIKE '%$keyword%' OR loc LIKE '%$keyword%' ORDER BY depid ASC";
    }
    $res=$conn->query($sql);
    if(!$res)
        echo "<script>alert('服务器出错！');window.location.href='index.php'</script>";
    $maxlen=10;     //单页最大十条
    $maxpg=floor((($res->num_rows==0?1:$res->num_rows)-1)/$maxlen);   //最大页号
    $pg=0;
    if(isset($_GET["page"])){
        $pg=$_GET["page"];
    }
    $rowbg=$pg*$maxlen;
    $sql="select *from dept order by depid ASC limit $rowbg,$maxlen";   //取出一页的数据
    if($flag==1){
        $sql="select *from dept WHERE depid='$keyword' OR pname LIKE '%$keyword%' OR loc LIKE '%$keyword%' ORDER BY depid ASC limit $rowbg,$maxlen";
    }
    $res=$conn->query($sql);
    if(!$res)
        echo "<script>alert('服务器出错！');window.location.href='index.php'</script>";
    $actlen=$res->num_rows;
    $rows=$res->fetch_all();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/infopage.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <style>
        .right_part{
            width: 15%;
            float: left;
        }
        .left_part{
            width: 85%;
            float: right;
            box-shadow: -2vh -2vh 5vh rgb(58 55 55 / 25%);
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
                    echo '<div class="person_box">'.$id_name.'
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
            <div class="sear_box"><a><span class="sear_box_0 glyphicon glyphicon-search se_ico"></span></a><input type="text" class="search_inp" placeholder="搜索部门ID/名称/地址"><div class="reset_btn">重置</div></div>
                <div class="info_box">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>部门ID</th>
                            <th>部门名称</th>
                            <th>部门地址</th>
                            </tr>
                        </thead>
                        <?php
                            for($i=0;$i<$actlen;$i++){
                                $pla=$i+1;
                                echo'
                                <tbody>
                                    <tr>
                                    <th scope="row">'.$pla.'</th>
                                    <td class="the_id'.$i.'">'.$rows[$i][0].'</td>
                                    <td>'.$rows[$i][1].'</td>
                                    <td>'.$rows[$i][2].'</td>
                                    <td class="btn btn-default delete_dep">删除</td>
                                    <td class="btn btn-default cg_infomation">修改信息</td>
                                    </tr>
                                </tbody>
                                ';
                            }
                        ?>
                    </table>
                    <div class="cg_box">
                        <input class="cg_id" type="text" placeholder="(ID)不修改请勿填写">
                        <input class="cg_name" type="text" placeholder="(名称)不修改请勿填写">
                        <input class="cg_loc" type="text" placeholder="(地址)不修改请勿填写">
                        <a class="btn btn-default cg_btn_dep">确定修改</a>
                    </div>
                    <div class="add_box">
                        <input class="add_id" type="text" placeholder="(ID)必填">
                        <input class="add_name" type="text" placeholder="(名称)必填">
                        <input class="add_loc" type="text" placeholder="(地址)必填">
                        <a class="btn btn-default add_btn_dep">添加</a>
                    </div>
                    <a href="?page=<?php echo $pg-1<0?0:$pg-1;?>" class="btn btn-default ret_btn">上一页</a>
                    <a href="?page=<?php echo $pg+1>$maxpg?$maxpg:$pg+1;?>" class="btn btn-default ret_btn">下一页</a>
                    <a class="btn btn-default ret_btn add_dep">增加部门</a>
                </div>
            </div>
        </div>
        <div class="right_part">
            <div class="right_box">
                <a class="btn btn-default" href="admin.php" role="button">员工信息管理</a>
                <a class="btn btn-default highlight" href="#" role="button">部门信息管理</a>
            </div>
        </div>
    </div>
</body>
<script src="JS/jquery.min.js"></script>
<script src="JS/index.js"></script>
<script src="JS/admin.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/front.min.js"></script>
</html>