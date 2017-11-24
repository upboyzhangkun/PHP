<?php
//声明命名空间
namespace Home\Controller;
//引入父类
use Think\Controller;
//声明类并且继承父类

class IndexController extends Controller {
    public function index(){
        //echo date('y');//测试
        //心得板块
        //查询数据
        $model = M('Doc');
        $data = $model -> select();	//查询全部
        //传递给模版
        $this -> assign('data',$data);


        /*$post = I('post.');
        //实例化自定义模型
        $model=D('Knowledge');//D实例化必须是model下的文件
        //M可以是数据库名
        //数据保存方法
        //这个addDate方法是model里创建的方法啊
        $result = $model -> addData($post , $_FILES['thumb']);
        //判断结果
        /*if($result){
            //成功后
            $this -> success('添加成功！');
        }*/

        //处理表单提交
        $model = M('Knowledge');
        //创建数据对象
        $data = $model -> create();
        //添加时间字段
        //$data['addtime'] = time();
        //保存数据表
        $result = $model -> add($data);

        //获取数据
        $checkData= M('Knowledge')->select();
        //传递数据给模板
        $this->assign('checkData',$checkData);



        //展示模版
        $this -> display();




    }

    //showContent方法
    public function showContent(){
        //接收id
        $id = I('get.id');
        //查询数据
        $data = M('Doc') -> find($id);
        $this -> assign('showContent',$data);
        //输出内容，并且还原被转移的字符
        //echo htmlspecialchars_decode($data['content']);
        //展示模版
        $this -> display();
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








    //测试
    public function tt(){
        $m = D('Doc');
        dump($m -> test());
    }
}