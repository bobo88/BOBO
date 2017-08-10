<?php
session_start(); 
//建立数据库连接
require_once '../mysql_connect.php';
require_once '../inc_session.php';
//关闭数据库连接
$link->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <? include '../top.html'; ?>
    <link rel="stylesheet" href="">
    <style>
       
    </style>
    <link rel="stylesheet" href="http://www.yuanbo88.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/boot_public.css">
</head>
<body>
    <header class="header">
        <? include '../b_public_top.php'; ?>
    </header>

    

<footer id="footer">
     
</footer><!--end #footer -->



<script>
$LAB.script("http://www.yuanbo88.com/dist/minjs/bootstrap.min.js")
    .wait(function(){
   
    })
</script>

</body>
</html>