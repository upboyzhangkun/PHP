<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link href="/zhangkunPHP/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
<div class="container" style="margin-top: 30px">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">

            </div>
        </div>
    </nav>
    <div style="padding-left: 10px; font-size: 20px">
        <h2><?php echo ($showContent["title"]); ?></h2>
        <br>
        <div class="row">
            <div class="col-md-8">作者：<?php echo ($showContent["author"]); ?></div>
            <div class="col-md-4">时间：<?php echo (date('Y-m-d H:i:s',$showContent["addtime"])); ?></div>
        </div>
        <br>
        <p class="text-left"><?php echo (htmlspecialchars_decode($showContent["content"])); ?></p>
    </div>
</div>




</body>
</html>