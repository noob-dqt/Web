<?php 
    $server="127.0.0.1:3306";//服务器地址
    $username= "root";        //用户名
    $userpwd= "123456";         //密码
    $conn= mysqli_connect($server,$username,$userpwd);
    if(!$conn){
	    die("数据库连接失败：".mysql_error($conn));
    }
    mysqli_set_charset($conn,'utf8');//解决乱码
    // mysqli_select_db($conn,'personal_info');
    // else echo "成功";
?>