<?php
header("content-type:text/html;charset=utf-8");

class Model{

	public $table_name;	//表名
	public $config;	//配置信息
	public $pdo;	//pdo对象
	public $where = array("1=1");	//条件
	static public $field;	//字段信息 

	public function __construct(){
		//加载数据库配置信息
		$this->config = require CONFIG_DIR.'/config.php';

		//配置数据库
		$msn = "{$this->config['dbtype']}:host={$this->config['host']};dbname={$this->config['dbname']}";  

		$this->pdo = new PDO($msn, $this->config['dbuser'], $this->config['dbpwd']);  // 链接数据库

		$this->pdo->exec('SET NAMES utf8');   //解决中文乱码问题
	}


	//执行PDO
	public function query($sql = ''){
		return $this->pdo->query($sql);
	}
}