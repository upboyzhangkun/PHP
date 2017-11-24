<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>变量分配</title>
</head>
<body>
<?php echo ($array[0]); ?> 和 <?php echo ($array[1]); ?> 在 <?php echo ($array[2]); ?>！


<hr/>

<?php echo ($array2[0][0]); ?> <?php echo ($array2[0][1]); ?>
和
<?php echo ($array2[1][0]); ?> <?php echo ($array2[1][1]); ?> <?php echo ($array2[1][2]); ?>
在
<?php echo ($array2[2][0]); ?> <?php echo ($array2[2][1]); ?>
！


</body>
</html>