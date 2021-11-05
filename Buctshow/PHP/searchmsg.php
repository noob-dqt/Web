<?php
	include('connect.php');
	mysqli_select_db($conn,'secret');
	$keyw=$_POST['keywords'];
	$sql="select * from original_data where content like '%$keyw%' ";
	$res=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    <title>Secret Wall</title>
    <link rel="stylesheet" href="../CSS/showmsgs.css" />
    <style type="text/css">
    	#btn2{
    		margin: 1vh 0 0 45%;
    	}
    	.ts{
    		margin-left: 40%;	
    	}
    	p{
    		color: #dadccc;
    	}
    	.mainmsg{
    		margin-left: 1%;
    	}
    	.pbtime{
    		margin-left: 5%;
    		display: inline;
    	}
    	.reply button{
    		margin-left: 3%;
    		border-radius: 1vh;
    		background-color: #f3a868;
    		opacity: 0.6;
    	}
    	.reply button:hover{
    		opacity: 1;
    	}
    </style>
  </head>
  <body>
    <div id="box">
	    <div id="salert"><p id="sal_ct"></p></div>
	    <div id="cont">
	    	<p class="ts">已为您查询到：<?php echo "$num"; ?> 条结果</p>

	    	<?php 
		    	while ($sing=mysqli_fetch_assoc($res)) {
		    		$orgstr=$sing["content"];
                    $len=strlen($orgstr);
		    		$simp=mb_substr($orgstr,0,min(20,$len));
		    		echo ' <div class="reply">
			      		<p class="mainmsg"><strong>发布内容</strong>:'.$simp.'</p>
			      		<p class="pbtime">发布时间:'.$sing["time"].'</p>
			      		<button onclick="viewdet('.$sing["num"].')">查看详情</button>
			      		</div>';
		    	}
	    	?>
	    </div>
  
      <button id="btn2" onclick="tback()">返回</button>
    </div>
    <script src="../JS/searchmsg.js"></script>
    <script src="../JS/jqury.js"></script>
  </body>
</html>
<?php
    mysqli_close($conn);
?>