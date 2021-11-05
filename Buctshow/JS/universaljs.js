function sfalert(str){
  var al=document.getElementById('sal_ct');
  al.innerHTML= str;
  var appear=document.getElementById('salert');
  appear.style.display = 'block';
  setTimeout(function(){appear.style.display = 'none';}, 3000);
}

function send_mail(obj){
	var toemail=document.getElementById('cfemail').value;
	if(toemail==""){
		sfalert('请先输入邮箱');
		return ;
	}
	$.ajax({
	  type: "POST",
	  url: "PHP/req_email.php",
	  data: {"toemail":toemail,"flag":obj},
	  dataType: "json",
	  // dataType: "text",
	  success: function(msg){
	  	// msg=JSON.parse(msg);
	  	// console.log(msg);
	  	var info="验证码已发送请注意查收";
	  	if(msg["code"]!='0') info="发送失败，请检查邮件地址是否正确";
	  	sfalert(info);
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function lgout(){
	$.ajax({
	  type: "POST",
	  url: "PHP/universal.php",
	  data: {"lgout":"true"},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	location.reload();
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function nofresh_lgout(){
	$.ajax({
	  type: "POST",
	  url: "PHP/universal.php",
	  data: {"lgout":"true"},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  },
	  error:function(msg){
	    sfalert('发生未知错误请联系管理员解决');
	  }
  });
}

function updata(){
	var email=document.getElementById('Email').value;
	var orgpass=document.getElementById('orgPass').value;
	var newname=document.getElementById('name').value;
	var newpass=document.getElementById('newPass').value;
	var confirnew=document.getElementById('confirmnew').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/confir-change-info.php",
	  data: {"email":email,"org-pass":orgpass,"new-name":newname,"new-pass":newpass,"confir-new-pass":confirnew},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	sfalert(msg);
	  	if(msg=="修改成功,请重新登录"){
	  		nofresh_lgout();
	  		setTimeout(function(){window.location.href="index.php";}, 3000);
	  		
	  	}
	  },
	  error:function(msg){
	    sfalert('发生未知错误，请联系管理员解决');
	  }
  });
}

function register(){
	var name=document.getElementById('username').value;
	var email=document.getElementById('cfemail').value;
	var cfm=document.getElementById('cfm').value;
	var pwd=document.getElementById('pwd').value;
	var confirmpwd=document.getElementById('confirmpwd').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/register.php",
	  data: {"username":name,"email":email,"pwd":pwd,"confirmpwd":confirmpwd,"mailcf":cfm},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	// console.log(msg);
	  	sfalert(msg);
	  	if(msg=="注册成功"){
	  		setTimeout(function(){window.location.href="index.php";}, 3100);
	  	}
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function login(){
	var name=document.getElementById('username').value;	
	var pwd=document.getElementById('pwd').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/login.php",
	  data: {"username":name,"pwd":pwd},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	// console.log(msg);
	  	sfalert(msg);
	  	if(msg=="登录成功"){
	  		setTimeout(function(){window.location.href="index.php";}, 3100);
	  	}
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function findpass(){
	var email=document.getElementById('cfemail').value;
	var cfm=document.getElementById('cfm').value;
	var pwd=document.getElementById('pwd').value;
	var confirmpwd=document.getElementById('confirmpwd').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/forget-comfirm.php",
	  data: {"email":email,"pwd":pwd,"confirmpwd":confirmpwd,"mailcf":cfm},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	sfalert(msg);
	  	if(msg=="此账号还未注册"){
	  		setTimeout(function(){window.location.href="register.html";}, 3100);
	  	}
	  	if(msg=="密码修改成功"){
	  		setTimeout(function(){window.location.href="login.html";}, 3100);
	  	}
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function upintro(){
	var intro=document.getElementById('introduction').value;
	$.ajax({
	  type: "POST",
	  url: "PHP/updateintro.php",
	  data: {"intro":intro},
	  // dataType: "json",
	  dataType: "text",
	  success: function(msg){
	  	sfalert(msg);
	  },
	  error:function(msg){
	    sfalert('未知错误请联系管理员解决');
	  }
  });
}

function uppic(){
	$("#file").trigger("click");
}