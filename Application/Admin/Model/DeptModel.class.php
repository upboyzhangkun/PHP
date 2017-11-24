<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/9/30
 * Time: 20:07
 */
//部门 模型，数据库的名字是db_oa
//           数据表的名字是tp_dept
//模型命名规则，去前缀表明，DeptModel.class.php

//声明命名空间
namespace Admin\Model;
//引入父类模型
use Think\Model;

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


//声明模型，继承父类模型
class DeptModel extends Model{
//模型虽然已经创建完成，
//但是由于模型的本质是一个类，类在使用的时候需要实例化操作。

//开启批量验证
    //protected $patchValidate = true;
    //字段映射定义
    protected $_map             =   array(
        //映射规则
        //键是表单中的name值 = 值是数据表中的字段名
        'abc'		=>		'name',
        'wasd'		=>		'sort'
    );

    // 自动验证定义
    // protected $_validate        =   array(
    // 		//针对部门名称的规则,必填，不能重复
    // 		array('name','require','部门名称不能为空！'),
    // 		array('name','','部门已经存在！',0,'unique'),
    // 		//排序字段的验证,数字
    // 		//array('sort','number','排序必须是数字！'),
    // 		//使用函数的方式来验证排序是否是数字
    // 		array('sort','is_numeric','排序必须是数字！',0,'function'),
    // 	);


}

