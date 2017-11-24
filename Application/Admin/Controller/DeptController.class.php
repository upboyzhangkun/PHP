<?php
//命名空间声明
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并且继承父类
class DeptController extends CommonController{

    //数据库
    /*
     create database db_oa;

    use db_oa;

    create table tp_dept(
      id int not null auto_increment,
      name varchar(50) not null,
      pid int not null default 0,
      sort int not null default 50,
      remark varchar(255),
      primary key(id)
    ) engine = myisam default charset = utf8;


     */

	//展示实例化的结果
	public function shilihua(){
		//普通实例化方法
		//$model = new \Admin\Model\DeptModel();

        /*
        上述的普通实例化方法虽然可以进行实例化操作，但是使用上比较麻烦，
        还需要考虑命名空间，所以ThinkPHP为了简单、快速、高效开发，
        为我们提供了2个快速方法可以对模型进行实例化操作：
        M方法和D方法。
        D方法实例化：
            $obj = D([‘模型名’]);
        表达的含义：实例化我们自己创建的模型（分组/Model目录中）；
        如果传递了模型名，则实例化指定的模型，如果没有指定或者模型名
        不存在，则直接实例化父类模型（Model.class.php）。

        M方法实例化：
            $obj = M([‘不带前缀的表名’]);
        表达的含义：直接实例化父类模型（Think目录下的Model.class.php）；
        如果指定了表名，则实例化父类模型的时候关联指定的表；
        如果没有指定表名（没有传递参数）则不关联表，
        一般用于执行原生的sql语句（M() -> query(原生的sql语句)）。
         * */

		//实例化自定义模型 D
		//$model = D('Dept');	//其实例化结果和使用普通new方法是一样的
		//$model = D();	//实力了父类模型
		//实例化父类
		//$model = M('Dept');	//关联数据表
		$model = M();	//实例化父类模型，不关联数据表
		dump($model);
	}

	//add方法使用
	public function tianjia(){

	    /*
	    mysql中增加操作使用的语法格式是：insert into语句。
        在ThinkPHP中系统给我们封装好了模型中的方法，
	    可以通过方法来实现数据的增加操作，这个方法叫做add方法：
	    $model -> add(一维数组);
        一维数组要求必须是键值（关联）数组，键必须和数据表中字段名要匹配，
	    如果不匹配则在增加的时候会被ThinkPHP过滤掉。
	    */


		//实例化模型
		$model = M('Dept');	//直接使用基本的增删改查可以使用父类模型
		//声明数组(关联数组)
        //Add方法的返回值是新增记录的主键id。
		/*$data = array(
					'name'	=>	'财务部',
					'pid'	=>	'0',
					'sort'	=>	'2',
					'remark'=>	'这是财务部门'
				);
		$result = $model -> add($data);//增加操作
		*/

		//批量添加
		$data = array(
					array(
							'remark'	=>	'权力最高的部门',
							'name'		=>	'总裁办',
							'sort'		=>	'4',
							'pid'		=> 	'0'
						),
					array(
							'remark'=>	'123',
							'name'	=>	'公关部',
							'sort'	=> 	'3',
							'pid'	=>	'0',
						)
				);
		//批量添加
		$result = $model -> addAll($data);
		dump($result);
	}

	//save方法的使用
    /*
        修改操作
        在mysql中修改操作使用的是：update table语句。
        在ThinkPHP中使用的是save方法，语法格式：
            $model -> save(一维关联数组);
        条件需要一维关联数组必须要有主键信息。
        如果没有主键信息，则相当于批量修改，
        在ThinkPHP中，系统为了防止误操作，不允许批量修改。
    */
	public function xiugai(){
		//实例化模型
		$model = M('Dept');
		//修改操作
		$data = array(
					'id'	=>	'2',
					'sort'	=>	'22',
					'remark'=>	'今天发工资'
				);
		$result = $model -> save($data);
		//打印
		dump($result);
	}

	//查询
	public function chaxun(){

        /*
           Mysql中查询操作使用的语法是：select语句。
           在ThinkPHP中系统封装了方法可以直接用于查询：select方法、find方法。
           Select方法语法：
               $model -> select();			表示查询全部的信息
               $model -> select(id);		表示查询指定id的信息
               $model -> select(‘id1,id2,id3,id4….’);
                   表示查询指定id集合的信息，等价于mysql中in语句

           Find方法语法：
               $model -> find();  表示查询当前表中的第一条记录，
                                  相当于limit 1;
               $model -> find(id);	表示查询表中的指定id的记录；

           返回值：
               Select方法返回值是一个二维数组，
                   即时查询的是一条记录返回也是二维数组；
                   find返回值是一维数组。
        * */


		//实例化模型
		$model = M('Dept');
		//select部门
		$data = $model -> select();	//查询全部
		$data = $model -> select(3);	//指定id
		$data = $model -> select('2,4');	//指定id集合

		//find部分
		$data = $model -> find();	//limit 1
		$data = $model -> find(1);	//指定id
		//打印
		dump($data);
	}

	//删除操作
	public function shanchu(){
		//实例化模型
		$model = M('Dept');
		//删除操作
		//$result = $model -> delete();	//false
		//$result = $model -> delete(14);//删除指定id
		$result = $model -> delete('1,13');	//删除多个id记录
		//打印
		dump($result);
	}

	//add方法
	public function add(){

		//判断请求类型
		if(IS_POST){
			//处理表单提交
			//$post = I('post.');
			//写入数据
			$model = D('Dept');
			//数据对象创建
			$data = $model -> create();	//不传递参数则接收post数据

			//判断验证结果
			if(!$data){
				//提示用户验证失败
				//dump($model -> getError());die;
				$this -> error($model -> getError());exit;
			}
			dump($data);//die;
			$result = $model -> add();


			//判断返回值
			if($result){
				//成功
				$this -> success('添加成功',U('showList'),3);
			}else{
				//失败
				$this -> error('添加失败');
			}
		}else{
			//查询出顶级部门
			$model = M('Dept');
			$data = $model -> where('pid = 0') -> select();
			//展示数据
			$this -> assign('data',$data);
			//展示模版
			$this -> display();
		}
	}

	//showList
	public function showList(){
		//模型实例化
		$model = M('Dept');
		//查询
		$data = $model -> order('sort asc') -> select();
		//二次遍历查询顶级部门
		foreach ($data as $key => $value) {
			if($value['pid'] > 0){
				//查询pid对应的部门信息
				$info = $model -> find($value['pid']);
				//只需要保留其中的name
				$data[$key]['deptname'] = $info['name'];
			}
		}
		//使用load方法载入文件
		load('@/tree');
		$data = getTree($data);
		//dump($data);die;
		//传递模版
		$this -> assign('data',$data);
		//展示模版
		$this -> display();
	}

	//edit
	public function edit(){
		if(IS_POST){
			//处理post请求
			$post = I('post.');
			//实例化
			$model = M('Dept');
			//保存操作
			$result = $model -> save($post);
			//判断结果成功与否
			if($result !== false){
				//修改成功
				$this -> success('修改成功',U('showList'),3);
			}else{
				//修改失败
				$this -> error('修改失败');
			}
		}else{
			//接收id
			$id = I('get.id');
			//实例化模型
			$model = M('Dept');
			//查询部门信息
			$data = $model -> find($id);
			//查询全部的部门信息，给下拉列表使用
			$info = $model -> where("id != $id") -> select();
			//变量分配
			$this -> assign('data',$data);
			$this -> assign('info',$info);
			//展示模版
			$this -> display();
		}
	}

	//del
	public function del(){
		//接收参数
		$id = I('get.id');
		//模型实例化
		$model = M('Dept');
		//删除
		$result = $model -> delete($id);
		//判断结果
		if($result){
			//删除成功
			$this -> success('删除成功！');
		}else{
			//删除失败
			$this -> error('删除失败！');
		}
	}
}