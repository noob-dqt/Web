function sfalert(str){
    var al=document.getElementById('sal_ct');
    al.innerHTML= str;
    var appear=document.getElementById('salert');
    appear.style.display = 'block';
    setTimeout(function(){appear.style.display = 'none';}, 2000);
}
log_btn=document.getElementById("log_btn");
log_btn.onclick=function(){
    var name=document.getElementById('userid').value;	
	var pwd=document.getElementById('password').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/login.php",
	  data: {"id":name,"pwd":pwd},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	sfalert(msg);
	  	if(msg=="登录成功"){
	  		setTimeout(function(){window.location.href="index.php";}, 1100);
	  	}
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}
$("input").keypress(function(e){
    var key=e.which;
    if(key==13){
        $("#log_btn").trigger("click");
    }
});