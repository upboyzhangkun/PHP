<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header("Content-type:text/html;charset=utf-8");
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
/*
在ThinkPHP系统为了方便开发，提供了以下两种模式：
开发/调试模式、生产模式。
调试模式：是指在开发调试阶段所使用的模式，错误信息比较详细；
生产模式：是指项目上线的时候所使用的模式，错误信息比较模糊；

在生产模式下系统函数库文件functions.php、系统的配置文件、
应用配置文件没有被加载，但是多了一个common~runtime.php文件
（没有被加载的配置文件的配置项都放到了新增文件中）。
*/


// 定义应用目录
define('APP_PATH','./Application/');

//定义工作路径
define('WORKING_PATH', str_replace('\\','/',__DIR__));
//定义上传根目录
define('UPLOAD_ROOT_PATH', '/Public/Upload/');
//echo WORKING_PATH . UPLOAD_ROOT_PATH;die;


// 定义应用目录


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单