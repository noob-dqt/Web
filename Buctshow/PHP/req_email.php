<?php
	$code = str_pad(mt_rand(0, 999999), 6, "0", STR_PAD_BOTH);
	$toWho=$_POST['toemail'];
	$flag=$_POST['flag'];
	function send_post($url, $post_data) {
	    $postData = http_build_query($post_data);
	    $options = array(
	        'http' => array(
	            'method' => 'POST',
	            'header' => 'Content-type:application/x-www-form-urlencoded',
	            'content' => $postData,
	            'timeout' => 15 * 60 // 超时时间（单位:s）
	        )
	    );
	    $context = stream_context_create($options);
	    $result = file_get_contents($url, false, $context);

	    return $result;
	}
	$post_data = array(
		'toWho' =>$toWho,
		'say' => '欢迎使用北化微show，您的验证码是：'.$code,
	    'warrant' => '1a5E561-oW459651*1+e',
	);

	$res=send_post('https://que.letmefly.xyz/sendMail/', $post_data);

	$val=json_decode($res);


	if($val[9]=='0'){
		// setcookie($toWho, $code, time()+3600);
		session_start();
		if($flag=="reg"){
			$_SESSION[$toWho]=$code;
		}
		else{
			$_SESSION[$toWho."find"]=$code;
		}
	}
	exit($val);
?>