<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>视图中使用函数</title>
</head>
<body>
<?php echo (strtoupper(substr($str,0,6))); ?><br>
<?php echo ($time); ?><br>
<?php echo (date('Y-m-d H:i:s',$time)); ?>
</body>
</html>