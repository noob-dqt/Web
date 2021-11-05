<?php
    session_start();
	header('Content-type:text/html;charset=utf-8');
	include('connect.php');
    mysqli_select_db($conn,'liuyanban');
    $username=$_POST["username"];
    $password=$_POST["pwd"];
    if(!$username || !$password){
    	exit('请填写登录信息');
    }
    else{
    	$sql1="select * from mybd where username='$username' and password= '$password' ";
        $sql2="select * from mybd where email='$username' and password= '$password' ";
    	$res1=mysqli_query($conn,$sql1);
        $res2=mysqli_query($conn,$sql2);
    	$row1=mysqli_num_rows($res1);
        $row2=mysqli_num_rows($res2);
        $rw1=$res1->fetch_assoc();
        $rw2=$res2->fetch_assoc();
	    if($row1||$row2){
            $_SESSION["username"]=$username;
            exit('登录成功');//登录成功       
        }
        else
	    {
	    	exit('用户名或密码不正确(也可以使用邮箱登录)');
	    }
    }
    mysqli_close($conn);
?>