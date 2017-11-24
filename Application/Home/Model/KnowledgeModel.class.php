<?php
//声明命名空间
namespace Home\Model;
//引入父类
use Think\Model;

class KnowledgeModel extends Model {

    public function addData($post,$file){
        //判断是否有文件需要处理
        //要求size大于0，或者error=0
        if ($file['error'] == '0'){
            //有文件
            //配置信息
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            //实例化上传类
            $upload = new \Think\Upload($cfg);
            //上传
            $info = $upload->uploadOne($file);
            //dump($info);die;
            if($info){
                //成功之后补全字段
                $post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                //制作缩略图
                //1、实例化类
                $image = new \Think\Image();
                //2、打开图片，传递图片的路径
                $image -> open(WORKING_PATH . $post['picture']);
                //3、制作缩略图，等比缩放
                $image -> thumb(100,100);
                //4、保存图片，传递保存完整路径（目录+文件名）
                $image -> save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename']);
                //补全thumb字段
                $post['thumb'] = UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename'];
            }

             //补全字段addtime
            $post['addtime'] = time();
            //dump($post);die;
            //$imgsrc='..'.$post['thumb'];
            //$imgsrc='http://127.0.0.1/zhangkunPHP/'.$post['thumb'];
            //echo "<img src='{$imgsrc}'/>";die;
            //添加操作
            return $this -> add($post);


        }

    }


}