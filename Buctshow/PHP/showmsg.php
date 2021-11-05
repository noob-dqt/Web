<?php
function savecookie(){
		setcookie("refre", "true", time()+3600);
  	setcookie("curr", $x, time()+3600);
}
    include('connect.php');
		mysqli_select_db($conn,'secret');
    $sqlall="select * from original_data";
		$num=mysqli_num_rows(mysqli_query($conn,$sqlall));
		//从num条记录中选取某条
    
    $x=rand(1,$num);    //随机产生一条消息,x即num
    
    $flag=$_COOKIE['refre'];
    if($flag=="true"){
    	$x=$_COOKIE['curr'];
    }

    if($_POST['searchx']=="true"){
      $x=$_POST['searchval'];
    }
    setcookie("refre", "true", time()+3600);
  	setcookie("curr", $x, time()+3600);

    $sql="select * from original_data where num = '$x'";

    $res=mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $msgs=$res["content"];
    $time=$res["time"];
    $id=$res["id"];
    $fnum=$res["fnum"];
    $sql2="select * from reply_data where fnum = '$x'";//查询num=x的所有评论
    $allres=mysqli_query($conn,$sql2);
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    <title>Secret Wall</title>
    <link rel="stylesheet" href="../CSS/showmsgs.css" />
  </head>
  <body>
    <div id="box">
    	<div id="pub-box">
        <form>
          <textarea id="txtbox" name="user_rep" placeholder="在这里写下你想对楼主说的话吧"></textarea>
          <button type="button" onclick="rep(<?php echo "$x" ?>)">发布</button>
        </form>
        <button onclick="calrep()">取消</button>
	    </div>
	    <div id="salert"><p id="sal_ct"></p></div>
      <div id="cont">
      	<div id="msgbx">
      		<img src="../images/2052545.jpg">
      		<p class="mainmsg"><?php echo " 楼主 : $msgs";?></p>
      		<p class="pbtime"><?php echo "$time";?></p>
      	</div>
      	<?php
		      	while($res2=mysqli_fetch_assoc($allres)){
			      		echo ' <div class="reply"><img src="../images/2052545.jpg">
			      		<p class="mainmsg">:'.$res2["content"].'</p>
			      		<p class="pbtime">:'.$res2["time"].'</p></div> ';
				    }
      	?>   
      </div>
      <button id="btn1" onclick="replyit()" >回复ta</button>
      <button id="btn2" onclick="tback()">返回</button>
      <button id="btn2" onclick="nextsec()">下一个秘密</button>
      
    </div>
    <script src="../JS/showmsg.js"></script>
    <script src="../JS/jqury.js"></script>
  </body>
</html>

<?php
    mysqli_close($conn);
?>