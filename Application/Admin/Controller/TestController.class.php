<?php
/**
 * 
 * @authors	九炼
 * @wat 传智播客教育集团 PHP学院
 * @date    2016-10-06 15:18:09
 * @url 	http://www.itcast.cn/php
 * @desc	请将此替换为文件描述...
 *
 * ━━━━━━神兽出没━━━━━━
 * 　　   ┏┓　 ┏┓
 * 　┏━━━━┛┻━━━┛┻━━━┓
 * 　┃              ┃
 * 　┃       ━　    ┃
 * 　┃　  ┳┛ 　┗┳   ┃
 * 　┃              ┃
 * 　┃       ┻　    ┃
 * 　┃              ┃
 * 　┗━━━┓      ┏━━━┛ Code is far away from bugs with the animal protecting.
 *       ┃      ┃     神兽保佑,代码无bug。
 *       ┃      ┃
 *       ┃      ┗━━━┓
 *       ┃      　　┣┓
 *       ┃      　　┏┛
 *       ┗━┓┓┏━━┳┓┏━┛
 *     　  ┃┫┫　┃┫┫
 *     　  ┗┻┛　┗┻┛
 *
 * ━━━━━━感觉萌萌哒━━━━━━
 */

//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明并且继承父类控制器
class TestController extends Controller{

	public function test(){
		//输出
		//echo 'Hello world.';
		//定义变量
		$var = date('Y-m-d H:i:s',time());
		//变量分配
        //$this->assign（‘模板中的变量名’，‘PHP中的变量名’）
        //一般情况，两个变量名名字一样

        //html输出：现在是北京时间：{$var}，用左右大括号，这是thinkphp语法，默认左右分隔符{ }
		$this -> assign('var',$var);
		//展示模版
		$this -> display();
	}

	public function test1(){
		//echo U('index');
		$this -> display('test');
	}

	public function test2(){
		//echo U('Index/index');  //Demo是view下的目录名
		$this -> display('Demo/test');
	}

	public function test3(){
		echo U('Index/index',array('id' => 100));
	}

	public function test4(){
		//成功跳转             //父类的U方法，实现跳转到哪个控制器的哪个方法
		$this -> success('操作成功',U('test'),10);
	}

	public function test5(){
		//失败跳转
		$this -> error('你人品有问题',U('test1'),10);
	}

	public function test6(){
		//模版常量的展示
        /*
        /zhangkunPHP/index.php/Admin       //到分组名结束
        /zhangkunPHP/index.php/Admin/Test   //到控制器名结束
        /zhangkunPHP/index.php/Admin/Test/test6 //到方法名结束
        /zhangkunPHP/Public                  //public
        /zhangkunPHP/index.php/Admin/Test/test6  //到路由的最后
        /zhangkunPHP/Public/Admin*/          //
        /*
        __MODULE__<br/>
        __CONTROLLER__<br/>
        __ACTION__<br/>
        __PUBLIC__<br/>
        __SELF__<br/>
        __ADMIN__*/   //这是自定义的
		$this -> display();
	}
	public function test7(){
	    $this->display();
	    //视图注释
          //  html中的注释写法：<!—注释内容-->
         //   普通的html注释会在页面的源代码中会被输出：
         //   在ThinkPHP中的模版注释：
         //   行注释：{//行注释内容}
         //   块注释：{/*块注释内容*/}
    }
    public function test8(){
	    //在ThinkPHP中变量的分配（不考虑变量类型）都是使用assign语法格式：
        //$this -> assign(‘模版中的变量’,php中变量);
        $array=array("zhangkun","lijiaojiao","papapa");
        $this->assign('array',$array);

        $array2=array(
            array('zhang','kun'),
            array('li','jiao','jiao'),
            array('papapa','heiheihei')
        );
        $this->assign('array2',$array2);

        $this->display();

        //在php中输出数组的具体元素可以通过下标的形式输出：$array[key]。
        //关于数组在模版中输出的语法格式：
	   //支持中括号形式：{$array[key]}
	   //支持点形式：{$array.key}
    }
    public function test9(){
        $stu=new Student();
        //dump($stu);
        $stu->id=100;
        $stu->name="张";
        $this->assign("stu",$stu);
        $this->display();

        //在ThinkPHP的模版中输出属性的值，可以通过下面的两种方式来实现：
        //支持箭头形式：{$obj -> attr}
        //支持冒号形式：{$obj : attr}
    }
    public function test10(){
        $this->display();

        /* 系统变量
        在ThinkPHP中系统提供了以下几个系统级别的变量（超全局变量在模版中的使用）：
        •$Think.server	等价于$_SERVER，获取服务器的相关信息
        •$Think.get		等价于$_GET，获取get请求的信息
        •$Think.post	等价于$_POST，获取post请求中的信息
        •$Think.request	等价于$_REQUEST，获取get和post中信息
        •$Think.cookie	等价于$_COOKIE，获取cookie中的信息
        •$Think.session	等价于$_SESSION，获取session中的信息
        •$Think.config	获取ThinkPHP中所有配置文件的一个总和，如果后面指定了元素，则获取指定的配置

        上述7个系统变量的语法都是一样的，在模版中使用的语法格式是：
            {$Think.xxx.具体的元素下标}
        例如：需要获取get请求中的id，则可以写成{$Think.get.id}。*/
    }
    public function test11(){

        $time=time();
        $this->assign('time',$time);

        $str=abcdefghijklmnop;
        //传到模板视图中
        $this->assign('str',$str);
        //
        $this->display();
      /*  视图中使用函数（重点）
        在实际开发的时候，有些变量在模版中不能直接使用，举个栗子：
      在数据表中存储的时间一般都是时间戳格式，在展示的时候需要处理格式化，需要遍历，
      操作相对而言比较繁琐。这个时候可以使用视图中使用函数的方式来解决这个问题。

        语法格式：
            {$变量|函数名1|函数名2=参数1,参数2,###…}

        参数说明：
            $变量：模版变量
            |：变量修饰符
            函数名1：表示需要使用的第一个函数
            函数名2：表示需要使用的第二个函数
            参数1、参数2：函数2的参数
                =：其实就是表示该函数有参数，类似于php中的函数名后面的()
            ###：表示变量的自身

        第一：###什么时候该写，什么不该写？当需要使用的函数只有一个参数并且参数是变量自身的时候，
        ####可以省略不写；当需要使用的函数有多个参数，但是其第一个参数是变量自身的时候，也可以省略不写###；
	    第二：关于函数名的说明，函数名对应的函数必须是php内置的函数或者是在函数库文件中定义好的函数；
        其他的主观臆造的函数不能使用。*/

    }
    public function test12(){
        //默认值：就是当某个变量不存在或者为空的时候，就会显示默认的字符，默认的字符就是变量的默认值。
        //语法：
	    //{$变量名|default=默认值}
	    //集合视图中使用函数的语法格式，可以得知default其实是ThinkPHP中封装的一个函数，默认值是函数的参数

        $sign="";  //为空的时候
        $this->assign("sign",$sign);
        $this->display();
    }
    public function head(){
        $this->display();
    }
    public function body(){
        $this->display();

        //在实际开发的时候，上述的路径很长还很容易写错。往往我们还会将其写成另外一种比较简单的方法：
        //<include file=’View目录名/模版文件名’ />

        /*
        除了使用include标签来引入文件之外，include标签还有另外一个用法：用来传递参数给引入的模版文件。
        <include file=’需要引入的模版文件’ 参数名=’参数值’ />
        上述的语法格式是给引入文件传递一个参数，参数名的名字就是后面的参数名，值就是后面的值。

        在目标文件中使用参数的位置写成下面的形式：
        [参数名]*/
    }
    public function foot(){
        $this->display();
    }
    public function test14(){
        //volist除了上述的name和id属性对之外，还支持更多的属性对，如mod、key、length等等，
        //而foreach标签除了上述的name和item之外只支持key属性对。
        //可以理解成foreach标签是volist标签的一个简化版本。

        //在ThinkPHP中变量的分配（不考虑变量类型）都是使用assign语法格式：
        //$this -> assign(‘模版中的变量’,php中变量);
        $array=array("zhangkun","lijiaojiao","papapa");
        $this->assign('array',$array);

        $array2=array(
            array('zhang','kun'),
            array('li','jiao','jiao'),
            array('papapa','heiheihei')
        );
        $this->assign('array2',$array2);

        $this->display();

        //在php中输出数组的具体元素可以通过下标的形式输出：$array[key]。
        //关于数组在模版中输出的语法格式：
        //支持中括号形式：{$array[key]}
        //支持点形式：{$array.key}
    }



    public function test17(){

        /*getLastSql方法在写的不方便，
        所以ThinkPHP3.2版本之后，系统增加了一个别名方法：_sql();
	     $model -> _sql();*/

        //实例化模型
        $model = M('Dept');
        //查询
        $data =$model -> select();

        //获取sql语句
        echo $model -> getLastSql();

    }

    //性能测试
    public function test18(){
        /*
           试一段代码的执行时间。在ThinkPHP中系统提供了一个性能测试的快速方法，这个快速方法叫做G。
           语法：
                G(‘开始标记’);
                需要统计效率的代码段
                ……
                G(‘结束标记’);
                G(‘开始标记’,’结束标记’,数字/字符m);
            针对G方法的第三个参数：如果参数是数字，
            则表示统计代码的执行时间，数字表示精确的小数位数，
            单位是秒；
            如果是字符m，则表示统计内存开销，
            单位是byt（需要服务器的支持）。
        */
        //定义标记
        G('start');

        for($i=0;$i<1000000;$i++){
            echo $i;
        }

        G('stop');
        echo "<hr>";
        echo G('start','stop',4);//小数点后四位
    }


     //AR模式
    /*
     AR模式即Active Record模式，是一个对象-关系映射（ORM）技术。
    每个AR 类代表一张数据表（或视图），数据表（或视图）的字段在 AR 类中
    体现为类的属性，一个AR 实例则表示表中的一行。

        AR模式的核心：三个映射/对应
            AR类	====		表		（模型类关联了数据表）
            AR类的属性		====		表的字段
            AR类实例		====		表的记录

        AR模式的语法格式：
        AR模式在ThinkPHP中的典型的应用：CURD操作。
            //实例化模型
            $model = M(关联的表);
        //字段映射到属性
            $model -> 属性/表中字段 = 字段值;
            $model -> 属性/表中字段 = 字段值;
            …
            //AR实例（操作）映射到表中记录
            $model -> CURD操作;	CURD操作没有参数
     * */
    public function test19(){
        //第一个映射，类映射表（类关联表）
        $model = M('Dept');
        //第二个映射，属性映射字段
        $model -> name = '技术部';
        $model -> pid = '0';
        $model -> sort = '10';
        $model -> remark = '技术部是很重要的';
        //第三个映射，实例映射记录，行
        $result = $model -> add();//没有参数
        dump($result);

    }
    public function test20(){
        //第一个映射，类映射表（类关联表）
        $model = M('Dept');
        //第二个映射，属性映射字段
        $model -> id = '3';//必须指定id
        $model -> name = '释放压力部';
        $model -> pid = '0';
        $model -> sort = '6';
        $model -> remark = '都听我的';
        //第三个映射，实例映射记录，行
        $result = $model -> save();//没有参数
        dump($result);

    }

    //AR模式删除操作
    public function test21(){
        //实例化模型
        $model = M('Dept');
        //指定主键信息
        $model -> id = '2,15';	//属性可以指定1个主键也可以指定多个主键
        //删除操作
        $result = $model -> delete();
        //打印结果
        dump($result);
    }

    //AR模式可以不指定主键信息
    public function test22(){
        //实例化模型
        $model = M('Dept');
        //查询
        $data = $model -> find(16);
        //修改
        //$model -> pid = '1';
        //$rest = $model -> save();
        //删除
        $rest = $model -> delete();
        dump($rest);
    }



    /*where方法
    作用：限制查询的条件。
    在原生的sql语句中：select 字段 from 表 where  条件;

    在ThinkPHP中系统封装了一个where方法来实现在原生的sql语句中where效果。
    语法：
	$model -> where(条件表达式);
    //在ThinkPHP中条件表达式支持字符串形式也支持数组形式，推荐使用字符串形式。
	$model -> CURD操作;*/
    public function test23(){
        //实例化
        $model = M('Dept');
        //查询
        $model->where('id > 3');
        $data=$model->select();

        dump($data);

    }


    //limit方法
    public function test24(){
        //实例化模型
        $model = M('Dept');
        //限制记录
        //第一种，查询前n条
        //$model -> limit(3);
        //$data = $model -> select();
        //第二种：查询带偏移量的形式
        $model -> limit(1,3);
        $data = $model -> select();
        //打印
        dump($data);
    }

    //filed方法  字段
    public function test25(){
        /*作用：限制输出的结果集字段。
        语法：
            $model -> field(‘字段1,字段2,字段3,字段4[ as 别名]….’);
        	//参数也就是select之后到from之前的那一串字符串。
        案例：使用field方法来查询部门表中的数据，只要显示id和name就可以。
        原生的sql：select id,name from sp_dept;*/

        //实例化模型
        $model = M('Dept');
        //限制字段
        $model -> field('id,name');
        //查询
        $data = $model -> select();
        //打印
        dump($data);
    }

    //order方法
    public function test26(){
        /*指按照指定的字段进行指定规则的排序。
        在原生的sql语法中使用是：order by 字段 排序规则（升序asc/降序desc）。
        语法：
            $model -> order(‘字段名 排序规则’);

        案例：使用order方法查询部门表中的数据，并且按照id进行降序排列。
        原生的sql：select * from sp_dept order by id desc;*/

        //实例化模型
        $model = M('Dept');
        //排序
        $model -> order('id desc');	//按照id 降序排列
        $data = $model -> select();
        //打印
        dump($data);
    }

    //group方法
    public function test27(){
        /*分组查询。
        在ThinkPHP中group分组可以使用group方法来实现：
            $model -> group(‘字段名’);

        案例：使用group的方法去查询部门表，要求查询出部门名称和出现的次数。
        原生的sql：select name,count(*) as count from sp_dept group by name;
        使用辅助方法实现上述的sql：
            因为上述的原生sql使用了限制字段和分组查询，
                所以在ThinkPHP中光靠group方法没有办法实现案例要求，
                还需要配合filed方法来实现*/

        //实例化模型
        $model = M('Dept');
        //设置查询限制
        $model -> group('name');
        $model -> field('name,count(*) as count');
        //查询
        $data = $model -> select();
        dump($data);
    }

    /*连贯操作：所谓连贯操作就是将辅助方法全部写在一行上的写法，
    这样的形式叫做连贯操作。
    也就是如下的形式：
        $model -> where() -> limit() -> order -> field() -> select();
    注意点：辅助方法的顺序，在连贯操作中没有要求，
        只要符合模型在最前面，CURD方法在最后面即可.
    */
    //连贯操作
    public function test28(){
        //实例化模型
        $model = M('Dept');
        //设置查询限制
        // $model -> group('name');
        // $model -> field('name,count(*) as count');
        // //查询
        // $data = $model -> select();
        //连贯操作
        $data = $model -> field('name,count(*) as count') -> group('name') -> select();
        dump($data);
    }



    /*在ThinkPHP中系统提供以下几个查询方法的使用，
        方便于在后期需要做统计的使用。
        •count()	表示查询表中总的记录数
        •max() 	表示查询某个字段的最大值
        •min()		表示查询某个字段的最小值
        •avg()		表示查询某个字段的平均值
        •sum()		表示求出某个字段的总和
    */
    //count
    public function test29(){
        //实例化模型
        $model = M('Dept');
        //查询
        $count1 = $model -> count();
        dump($count1);
        $count2=$model->where('id>3')->count();//有条件的
        dump($count2);
    }

    //max
    public function test30(){
        //实例化模型
        $model = M('Dept');
        //查询最大值
        $max = $model -> max('id');
        dump($max);
    }

    //min
    public function test31(){
        //实例化模型
        $model = M('Dept');
        //查询最大值
        $min = $model -> min('id');
        dump($min);
    }

    //avg
    public function test32(){
        //实例化模型
        $model = M('Dept');
        //求平均值
        $avg = $model -> avg('id');
        dump($avg);
    }

    //sum
    public function test33(){
        //实例化模型
        $model = M('Dept');
        //求总和
        $sum = $model -> sum('id');
        dump($sum);
    }


    /*前面我们介绍了sql调试的一个方法getLastSql或者别名_sql()，
    但是这个方法要求最后一条成功执行的sql，
    所以如果拿这个方法来调试sql，只能是调试逻辑错误，
    并不能拿来调试语法错误，所以这里给大家介绍一个新的sql调试方法：
    fetchSql()。
    语法：
        $model -> where() -> limit() … -> order() -> fetchSql(true) -> CURD操作;
    FetchSql方法使用的时候可以完全看作是一个辅助方法，
        所以要求必须在model之后，在CURD操作之前，顺序无所谓。
        FetchSql方法只能在ThinkPHP3.2.3版本之后使用。*/
    //fetchSql
    public function test34(){
        //实例化模型
        $model = M('Dept');
        //连贯操作
        $data = $model -> field('name,count(*) as count') -> fetchSql(true) -> group('name') -> select();
        dump($data);
    }



    /*
    在ThinkPHP中系统封装了一个方法用来实现对于session的操作：
    session方法（定义在系统函数库文件中functions.php）。
    •session(‘name’,’value’)	 创建一个名为name的session值，值是value
    •$value = session(‘name’)	 读取session中的name元素值，值赋给value
    •session(‘name’,null)		删除名为name元素的值
    •session(null)			删除全部的session元素
    •session()				读取全部的session信息
    •session(‘?name’)		判断名为name的session元素是否存在，
                           如果存在则返回true，如果不存在，则返回false。
    */
    public function test36(){
        session('name','张可能');
        session('age','12');
        dump($_SESSION);

        session('name','韩梅梅');
        session('name2','李雷');
        dump($_SESSION);
        //2、读取单个
        $value = session('name');
        dump($value);
        //3、清空单个
        session('name',null);
        dump($_SESSION);
        //4、全部删除
        session('name3','马冬梅');
        //session(null);
        //dump($_SESSION);
        //5、读取全部
        dump(session());
        //6、判断某个session是否存在
        dump(session('?name3'));
    }


    /*
     cookie支持
        •cookie(‘name’,’value’)		设置一个名为name的cookie值，值是value
        •cookie(‘name’,’value’,3600)设置一个名为name的cookie值，值是value，有效期是3600s
        •$value = cookie(‘name’)	读取名为name的cookie赋值给value
        •cookie(‘name’,null)		删除名为name的cookie值
        •cookie(null)				删除全部的cookie（有问题）
        •cookie()					获取全部的cookie
    案例：通过cookie方法对cookie进行操作。
    注意：在上述的几个方法使用中，cookie(null)这个方法有bug，虽然手册上写了说可以删除，
    但是在实际使用的时候并不能达到想要的效果,如果想这个操作可以实现则需要更改底层的实现代码.
     */
    //cookie
    public function test37(){
        //1、设置没有有效期的cookie
        cookie('name','xialuo');
        //2、设置带有有效期的cookie
        cookie('name2','shashibiya',3600);
        //3、获取单个cookie值
        dump(cookie('name2'));
        //4、清空单个
        cookie('name',null);
        //5、清空全部
        //cookie(null);	//有问题的
        //6、获取全部
        dump(cookie());
    }






    //调用函数库文件
    public function test38(){
        //使用函数
        gggg();
    }

    //测试load_ext_file引入
    public function test39(){
        /*通过配置项动态加载
        配置项LOAD_EXT_FILE的配置格式应该是类似于下面这种形式：
            LOAD_EXT_FILE	=>	‘abc,cde,efg…’
        而且上述的文件应该是位于应用级别的函数库目录中。
        配置项：
        在应用级别的配置文件中定义配置项LOAD_EXT_FILE，引入文件info.php
        */
        //使用函数
        getInfo();
    }

    //load方法
    public function test40(){
        /*通过load方法加载
        语法：load(‘@/不带后缀的php文件名’);
        需要注意的是，文件必须存在于分组级别的函数库目录中，
        并且只能用于定义的分组中。*/
        //load
        load('@/hello');
        //调用函数
        sayhello('jiaojiao li');
    }

    //常规验证码
    public function test41(){
        //配置
        $cfg = array(
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

    //中文验证码
    public function test42(){
        //配置
        $cfg = array(
            'useZh'     =>  true,           // 使用中文验证码
            'fontSize'  =>  20,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
        );
        //实例化验证码类
        $verify = new \Think\Verify($cfg);
        //输出图片
        $verify -> entry();
    }

    //table方法联表查询
    public function test43(){
        //实例化模型
        $model = M();	//执行原生的sql语句可以不要关联表
        //定义sql语句
        //$sql = "select t1.*,t2.name as deptname from sp_user as t1,sp_dept as t2 where t1.dept_id = t2.id;";
        //$result = $model -> query($sql);

        /*
            在ThinkPHP中一般不建议频繁的使用执行原生的sql语句方法执行sql，
            所以上述的方法还可以写成另外的一种形式：
            $model -> table(‘表名1 [as 别名1],表名2 [as 别名2]…’);
                //table方法也是连贯操作中的一个辅助方法。
            在使用table方法之后模型会自动关联上table方法中指定的数据表。
        */

        //连贯操作
        $result = $model -> field('t1.*,t2.name as deptname')
            -> table('sp_user as t1,sp_dept as t2')
            -> where('t1.dept_id = t2.id')
            -> select();
        //打印
        dump($result);
    }

    //join方法实现
    public function test44(){
        //实例化模型
        $model = M('Dept');
        //select t1.*,t2.name as deptname from sp_dept as t1 left join sp_dept as t2 on t1.pid = t2.id;
        //联表查询
        $result = $model -> field('t1.*,t2.name as deptname') -> alias('t1') -> join('left join sp_dept as t2 on t1.pid = t2.id') -> select();
        //打印
        dump($result);
    }

    //ip获取
    public function test45(){
        //获取ip
        echo get_client_ip(1);
    }

    //ip对应的物理地址
    public function test46(){
        //实例化对象
        $ip = new \Org\Net\IpLocation('qqwry.dat');
        $ss = I('get.ip');
        //查询
        $data = $ip -> getlocation($ss);
        dump($data);
    }












}
