<?php
//声明命名空间
namespace Admin\Controller;
//引入父类
use Think\Controller;

/*//数据库创建
 create table tp_knowledge(
   id int(11) not null auto_increment,
   title varchar(50) not null,
   thumb varchar(255) default null comment '缩略图',
   picture varchar(255) default null comment '图片',
   description varchar(255) default null comment '描述',
   content text comment '内容',
   author varchar(40) not null,
   addtime int(11) default null comment '添加时间',
   primary key (id)
 )engine=myisam auto_increment=1 default charset=utf8;
 */
//声明类，并继承父类
class KnowledgeController extends CommonController{

    //add方法，在View/Knowledge文件中有对应的add.html
    public function add(){
        //展示模板，即add.html
       // $this->display();

        //请求类型判断
        if (IS_POST){
            //如果是post 则处理请求
            $post = I('post.');
            /*主要用于更加方便和安全的获取系统输入变量，
            可以用于任何地方，用法格式如下：
            I('变量类型.变量名',['默认值'],['过滤方法'])
            echo I('get.name'); // 相当于 $_GET['name']
            echo I('get.id',0); // 如果不存在$_GET['id'] 则返回0
            echo I('get.name',''); // 如果不存在$_GET['name'] 则返回空字符串
            I('get.'); // 获取整个$_GET 数组
            */

            //实例化自定义模型
            $model=D('Knowledge');//D实例化必须是model下的文件
                                  //M可以是数据库名
            //数据保存方法
            //这个addDate方法是model里创建的方法啊
            $result = $model -> addData($post , $_FILES['thumb']);

            //判断结果
            if($result){
                //成功后
                $this -> success('添加成功！',U('showList'),3);

            }else{
                //失败
                $this->error('添加失败');
            }
        }else{
            //展示模板，即add.html
             $this->display();

        }

    }


    //显示列表方法
    public function showList(){
        //获取数据
        $data= M('Knowledge')->select();

        //传递数据给模板
        $this->assign('data',$data);

        //展示模板
        $this->display();

    }

    //download方法
    public function download(){
        //获取id
        $id = I("get.id");
        //查询数据信息
        $data = M('Knowledge') -> find($id);
        //下载代码
        $file = WORKING_PATH . $data['picture'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        readfile($file);
    }

}