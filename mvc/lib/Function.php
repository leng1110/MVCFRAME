<?php

function __autoload($class)
{

	include ROOT_DIR."/lib/".$class.'.php';
}

function Model($table_name){
	//model对象集合
	static $model_info = array();

	if(!isset($model_info[$table_name])){
		//验证model文件是否存在
		//验证model类是否存在
		
		//引入model文件
		include MODEL_DIR."/".$table_name.'.php';
	
		//实例化要调用的model
		$model_info[$table_name] = new $table_name;
	}

	return $model_info[$table_name];
}
