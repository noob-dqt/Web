function viewdet(x){
	$.ajax({
    type: "POST",
    url: "showmsg.php",
    data: {"searchx":"true","searchval":x},
    dataType: "text",
    success: function(msg){
      window.location='../PHP/showmsg.php';
    },
    error:function(obj){
      alert('出现未知错误，请稍后再来，或联系网站管理员');
    }
    });
}
function tback(){
    window.location='../SecretWall.php';
}