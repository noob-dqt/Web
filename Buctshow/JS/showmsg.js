function nextsec(){
	$.ajax({
	  type: "POST",
	  url: "replymsg.php",
	  // data: "user_secret="+info,
	  data: {"refre":"false"},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	    location.reload();
	  },
	  error:function(obj){
	    alert('出现未知错误，请稍后再来');
	  }

	  });
}
function tback(){
	$.ajax({
	  type: "POST",
	  url: "replymsg.php",
	  // data: "user_secret="+info,
	  data: {"refre":"false"},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	    window.location='../SecretWall.php';
	  },
	  error:function(obj){
	    alert('出现未知错误，请稍后再来');
	  }

	  });
}
function calrep(){
	  var t=document.getElementById("pub-box");
	  t.style.left = '-500vh';
}
function sfalert(str){
	  var al=document.getElementById('sal_ct');
	  al.innerHTML= str;
	  var appear=document.getElementById('salert');
	  appear.style.display = 'block';
	  setTimeout(function(){appear.style.display = 'none';location.reload();}, 1500);
}

function rep(fan){
	calrep();
	var info=document.getElementById('txtbox').value
	// var fan=<?php echo "$x" ?>;
	  $.ajax({
	  type: "POST",
	  url: "replymsg.php",
	  // data: "user_secret="+info,
	  data: {"user_rep":info,"fan":fan},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	    sfalert(msg);    
	  },
	  error:function(obj){
	    alert('未知上传错误，请稍后再试');
	  }
	  });
}

function replyit(){
	  var t=document.getElementById("pub-box");
	  t.style.left = '18%';
	  t.style.zIndex = '999';
}