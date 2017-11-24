<?php
//声明命名空间
namespace Home\Controller;
//引入父类
use Think\Controller;
//声明类并且继承父类
class LoveController extends Controller {
    function index(){
        //展示模版
        $this -> display();
    }



}
