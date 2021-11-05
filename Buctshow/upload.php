<?php 
   var_dump($_FILES['pic']);

   if ($_FILES['pic']['error']>0) {
   	   die ("上传失败");
   }
   $type = array('image/jpeg','image/png','image/gif','application/octet-stream','application/pdf','application/zip');

   // if(!in_array($_FILES['pic']['type'],$type))
   // {
   // 	die("上传文件类型不合法");
   // }
   $size = 1e7;

   if($_FILES['pic']['size']>$size)
   {
   	die("上传文件过大");
   }
   $path = './upload';
   if(!file_exists($path))
   {
   	 mkdir($path);
   }

   $suffix = strrchr($_FILES['pic']['name'],'.');

 /*  do{
       $name = md5(time().mt_rand(1,1000).uniqid()).$suffix;
    }while(file_exists($path.'/'.$name));
*/
    $name = $_FILES['pic']['name'];
    if(file_exists($path.'/'.$name))
    {
      echo "<script>alert('文件名重复，请改名')</script>";
      echo "<script>window.location.href='./github.php'</script>";
    }
    if(move_uploaded_file($_FILES['pic']['tmp_name'], $path.'/'.$name))
    {
    	echo "<script>alert('上传成功')</script>";
      echo "<script>window.location.href='./github.php'</script>";
    }
    else
    {
    	echo "未知错误";
    }
 ?>