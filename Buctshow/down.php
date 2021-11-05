<?php
    $file =  $_GET['act'];
    //header('Content-type:image/jpg');   // 发送指定文件 MIME 类型的头信息
    header('Content-Disposition:attachment;filename='.$file.'');   // 发送描述文件的头信息，附件和文件名
    //header('Content-Length:'.filesize($file));      // 发送指定文件大小的信息，单位是字节
    readfile("./upload/".$file."");
   
?>