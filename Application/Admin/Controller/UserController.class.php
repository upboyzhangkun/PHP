<?php
//声明命名空间
namespace Admin\Controller;
//引入父类
use Think\Controller;
//声明类继承父类

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

//用户管理的控制器

class UserController extends CommonController{

	//add方法
	public function add(){
		//判断请求类型
		if(IS_POST){
			//处理表单提交
			$model = M('User');
			//创建数据对象
			$data = $model -> create();
			//添加时间字段
			$data['addtime'] = time();
			//保存数据表
			$result = $model -> add($data);
			//判断是否保存成功
			if($result){
				//成功
				$this -> success('添加成功！',U('showList'),3);
			}else{
				//失败
				$this -> error('添加失败！');
			}
		}else{
			//查询部门信息
			$data = M('Dept') -> field('id,name') -> select();
			//分配到模版
			$this -> assign('data',$data);
			//展示模版
			$this -> display();
		}
	}

	//showList
	public function showList(){
		//模型实例化
		$model = M('User');
		//分页第一步：查询总的记录数
		$count = $model -> count();
		//分页第二步：实例化分页类，传递参数
		$page = new \Think\Page($count,1);	//每页显示1个
		//分页第三步：可选步骤，定义提示文字
		$page -> rollPage = 5;
		$page -> lastSuffix = false;
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('last','末页');
		$page -> setConfig('first','首页');
		//分页第四步：使用show方法生成url
		$show = $page -> show();
		//分页第五步：展示数据
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
		//分页第六步：传递给模版
		$this -> assign('data',$data);
		$this -> assign('show',$show);
		//分页第七步：展示模版
		$this -> display();
	}

	//charts方法
	public function charts(){
		//select t2.name as deptname,count(*) as count from sp_user as t1,sp_dept as t2 where t1.dept_id = t2.id group by deptname;
		$model = M();
		//连贯操作
		$data = $model -> field('t2.name as deptname,count(*) as count')
            -> table('tp_user as t1,tp_dept as t2')
            -> where('t1.dept_id = t2.id')
            -> group('deptname')
            -> select();
		//如果当前使用的php版本是5.6之后的版本，则可以直接将data二维数组assign，不需要任何处理；但是当前的php是5.3，所以需要进行字符串拼接
		$str = '[';
		//循环遍历字符串
		foreach ($data as $key => $value) {
			$str .= "['" . $value['deptname'] . "'," . $value['count'] . "],";
		}
		//去除最后的逗号
		$str = rtrim($str,',') . ']';
		//[['总裁办',1],['程序部',2],['管理部',2],['财务部',1],['运营部',1]]
		//传递给模版
		$this -> assign('str',$str);
		//展示模版
		$this -> display();
	}
}