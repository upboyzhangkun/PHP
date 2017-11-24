<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if(is_array($showdata)): $i = 0; $__LIST__ = $showdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href=""><?php echo ($vol["id"]); echo (msubstr($vol["title"],0,15)); ?> | <?php echo ($vol["author"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>