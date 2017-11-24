<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/zhangkunPHP/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/zhangkunPHP/Public/Admin/css/login.css" />
	<title>我的后宫</title>
</head>
<body style="background-color: #2E2D3C">
	<div id="container">
        <form action="<?php echo U('checkLogin');?>" method="post">
		<div id="bd">
			<div class="login1">
            	<div class="login-top"><h1 class="logo"></h1></div>
                <div class="login-input">
                	<p class="user ue-clear">
                    	<label>小&nbsp;&nbsp;&nbsp;名</label>
                        <input type="text" name="username" />
                    </p>
                    <p class="password ue-clear">
                    	<label>密&nbsp;&nbsp;&nbsp;码</label>
                        <input type="password" name="password" />
                    </p>
                    <p class="yzm ue-clear">
                    	<label>验证码</label>
                        <input type="text" name="captcha" maxlength="4" />
                        <!--
                            目标http://1006.com/index.php/Admin/Public/captcha
                            当前http://1006.com/index.php/Admin/Public/login
                        -->
                        <cite><img style="margin-left: 3px;" src="/zhangkunPHP/index.php/Admin/Public/captcha" onclick="this.src='/zhangkunPHP/index.php/Admin/Public/captcha/t/'+Math.random()" /></cite>
                    </p>
                </div>
                <div class="login-btn ue-clear">
                	<a href="javascript:;" class="btn">登录</a>
                    <div class="remember ue-clear">
                    	<input type="checkbox" id="remember" />
                        <em></em>
                        <label for="remember">记住密码</label>
                    </div>
                </div>
            </div>
		</div>
        </form>
	</div>
    <br><br>
    <div id="ft" style="font-size: 20px;color: black">2017&nbsp;&nbsp;加油！</div>
    <br><br>
</body>
<script type="text/javascript" src="/zhangkunPHP/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/zhangkunPHP/Public/Admin/js/common.js"></script>
<script type="text/javascript">
var height = $(window).height();
$("#container").height(height);
$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
	var height = $(window).height();
	$("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
	$("#container").height(height);
	
});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
	checkRemember($(this));
});

function checkRemember($this){
	if(!-[1,]){
		 if($this.prop("checked")){
			$this.parent().addClass('checked');
		}else{
			$this.parent().removeClass('checked');
		}
	}
}

//jQuery代码
$(function(){
    //给登录按钮绑定点击事件
    $('.btn').on('click',function(){
        //事件处理程序
        $('form').submit();
    });
});
</script>
</html>