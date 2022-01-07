<?php
    session_start();
    $id='';
    $flag_admin='0';
    $id_name="";
    //************判断登录问题 */
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
        // $_SESSION["search0"]=$_POST["search_text"];
        setcookie("search1",$_POST["search_text"],time()+3600);     //一小时
    }
    if(isset($_COOKIE["search1"])){
        if($_COOKIE["search1"]!="search_false"){
            $flag=1;
            $keyword=$_COOKIE["search1"];
            // echo "final:".$keyword;
        }
    }  
    //***************处理分页、搜索
    include('PHP/connect.php');
    $conn->select_db("emp_ms");
    $sql="SELECT y.*,x.isMg,z.name FROM userdata x,emp z,(SELECT x1.*,dept.pname,dept.loc FROM (SELECT id,name,mid,emp.depid FROM emp LEFT JOIN dept ON dept.depid=emp.id) x1 LEFT JOIN dept ON dept.depid=x1.depid) y WHERE x.id=y.id AND y.mid=z.id";
    if($flag==1){
        $sql="SELECT * FROM (SELECT y.*,x.isMg,z.name mname FROM userdata x,emp z,(SELECT x1.*,dept.pname,dept.loc FROM (SELECT id,name,mid,emp.depid FROM emp LEFT JOIN dept ON dept.depid=emp.id) x1 LEFT JOIN dept ON dept.depid=x1.depid) y WHERE x.id=y.id AND y.mid=z.id) x WHERE x.id='$keyword' OR x.name LIKE '%$keyword%' OR x.depid='$keyword' OR x.pname LIKE '%$keyword%' ORDER BY id ASC";
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
    $sql="SELECT y.*,x.isMg,z.name FROM userdata x,emp z,(SELECT x1.*,dept.pname,dept.loc FROM (SELECT id,name,mid,emp.depid FROM emp LEFT JOIN dept ON dept.depid=emp.id) x1 LEFT JOIN dept ON dept.depid=x1.depid) y WHERE x.id=y.id AND y.mid=z.id order by id ASC limit $rowbg,$maxlen";   //取出一页的数据
    if($flag==1){
        $sql="SELECT * FROM (SELECT y.*,x.isMg,z.name mname FROM userdata x,emp z,(SELECT x1.*,dept.pname,dept.loc FROM (SELECT id,name,mid,emp.depid FROM emp LEFT JOIN dept ON dept.depid=emp.id) x1 LEFT JOIN dept ON dept.depid=x1.depid) y WHERE x.id=y.id AND y.mid=z.id) x WHERE x.id='$keyword' OR x.name LIKE '%$keyword%' OR x.depid='$keyword' OR x.pname LIKE '%$keyword%' ORDER BY id ASC limit $rowbg,$maxlen";
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
                <div class="sear_box"><a><span class="sear_box_0 glyphicon glyphicon-search se_ico"></span></a><input type="text" class="search_inp" placeholder="搜索工号/姓名/所属部门"><div class="reset_btn">重置</div></div>
                <div class="info_box">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>工号</th>
                            <th>姓名</th>
                            <th>上级ID</th>
                            <th>上级姓名</th>
                            <th>所属部门ID</th>
                            <th>所属部门名称</th>
                            <th>所属部门地址</th>
                            <th>权限级别</th>
                            </tr>
                        </thead>
                        <?php
                            for($i=0;$i<$actlen;$i++){
                                $lever="(".$rows[$i][6].")";
                                if($rows[$i][6]==0) $lever=$lever."普通员工";
                                if($rows[$i][6]==1) $lever=$lever."部门负责人";
                                if($rows[$i][6]==2) $lever=$lever."系统管理员";
                                $pla=$i+1;
                                echo'
                                <tbody>
                                    <tr>
                                    <th scope="row">'.$pla.'</th>
                                    <td class="the_id'.$i.'">'.$rows[$i][0].'</td>
                                    <td>'.$rows[$i][1].'</td>
                                    <td>'.$rows[$i][2].'</td>
                                    <td>'.$rows[$i][7].'</td>
                                    <td>'.$rows[$i][3].'</td>
                                    <td>'.$rows[$i][4].'</td>
                                    <td>'.$rows[$i][5].'</td>
                                    <td>'.$lever.'</td>
                                    <td class="btn btn-default delete_emp">删除</td>
                                    <td class="btn btn-default cg_infomation">修改信息</td>
                                    </tr>
                                </tbody>
                                ';
                            }
                        ?>
                    </table>
                    <div class="cg_box">
                        <input class="cg_id" type="text" placeholder="(ID)不修改请勿填写">
                        <input class="cg_name" type="text" placeholder="(姓名)不修改请勿填写">
                        <input class="cg_mid" type="text" placeholder="(上级ID)不修改请勿填写">
                        <input class="cg_pid" type="text" placeholder="(所属部门ID)不修改请勿填写">
                        <input class="cg_pwd" type="text" placeholder="(密码)不修改请勿填写">
                        <input class="cg_lev" type="text" placeholder="(权限：0/1/2)不修改请勿填写">
                        <a class="btn btn-default cg_btn">确定修改</a>
                    </div>
                    <a href="?page=<?php echo $pg-1<0?0:$pg-1;?>" class="btn btn-default ret_btn">上一页</a>
                    <a href="?page=<?php echo $pg+1>$maxpg?$maxpg:$pg+1;?>" class="btn btn-default ret_btn">下一页</a>
                </div>
            </div>
        </div>
        <div class="right_part">
            <div class="right_box">
                <a class="btn btn-default highlight" href="#" role="button">员工信息管理</a>
                <a class="btn btn-default" href="dept_ms.php" role="button">部门信息管理</a>
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