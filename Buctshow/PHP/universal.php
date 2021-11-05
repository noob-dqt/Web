<?php
	$op=$_POST['firstcome'];
	if($op=="false"){
		setcookie("firstin", "false", time()+3600*8,'/');
	}
	$lg=$_POST['lgout'];
	if($lg=="true"){
		session_start();
		if(isset($_SESSION['username']))
		{
		    unset($_SESSION['username']);
		    exit('success');
		}
	}
?>