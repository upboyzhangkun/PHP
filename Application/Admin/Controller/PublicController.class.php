<?php
//命名空间声明
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并且继承父类
class PublicController extends Controller{
    /*
    实现后台登录功能
    控制器：PublicController.class.php
    模版：login.html
    方法：login	captcha	checkLogin*/

	//登录页面展示
	public function login(){
		//展示模版
		//$this -> display();

		/* 在ThinkPHP中有一个方法和display方法有点点相似。这个方法叫做fetch方法：
           Display方法：$this -> display();		展示模版
           Fetch方法：$this -> fetch();			获取模版（有返回值）
		   在ThinkPHP中系统封装好了一个友好的打印方法，这个方法是dump方法：
           语法格式：dump(需要打印的变量);		封装在系统的函数库文件functions.php中*/
		$str=$this->fetch();
		//dump($str);//这里html显示代码
        echo $str;
    }
    public function captcha(){
	    //验证码的配置
        $cfg=array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化验证码类
        $verify = new \Think\Verify($cfg);
        //输出验证码
        $verify -> entry();
    }

    /*
     创建YONG HU数据库
    CREATE TABLE tp_user(
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(40) NOT NULL,
    password char(32) NOT NULL,
    nickname varchar(40) DEFAULT NULL,
    truename varchar(40) DEFAULT NULL,
    sex varchar(10) NOT NULL,
    birthday date NOT NULL,
    tel varchar(11) NOT NULL,
    email varchar(50) NOT NULL,
    remark varchar(255) DEFAULT NULL,
    addtime int(11) DEFAULT NULL,
    role_id int(11) DEFAULT NULL,
    PRIMARY KEY (id)
    )ENGINE=MyISAM DEFAULT CHARSET=utf8;

    insert into tp_user values(1,'admin','123456','admin','张坤','男','2017-10-2','187000000','3476998852@qq.com','徐州',147000,1);

     * */

//checkLogin
    public function checkLogin(){
        //接收数据
        $post = I('post.');
        //验证验证码（不需要传参）
        $verify = new \Think\Verify();
        //验证
        $result = $verify -> check($post['captcha']);
        //判断验证码是否正确
        if($result){
            //验证码正确，继续处理用户名和密码
            $model = M('User');
            //删除验证码元素
            unset($post['captcha']);
            //查询
            $data = $model -> where($post) -> find();
            //判断是否存在用户
            if($data){
                //存在用户，用户信息持久化保存到session中，跳转到后台首页
                session('id',$data['id']);
                session('username',$data['username']);
                session('role_id',$data['role_id']);
                //跳转
                $this -> success('登录成功@~@',U('Index/index'),3);
            }else{
                //不存在
                $this -> error('用户名或密码错误..');
            }
        }else{
            //验证码不正确
            $this -> error('您输出的验证码错误..');
        }
    }

    //退出方法
    public function logout(){

        //在ThinkPHP中，不能在javascript文件、css文件等非模版文件中使用任何模版引擎的东西。
        //清除session
        //session(null);
        //跳转到登录页面
        $this -> success('退出成功',U('login'),3);
    }
}