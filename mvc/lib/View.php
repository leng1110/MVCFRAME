<?php


class view{

	public $param;
	public $config;

	public function __construct(){
		$this->config = require CONFIG_DIR."/config.php";
	}

	//渲染变量
	public function assign($key = "", $val = "")
	{
		$this->param[$key] = $val;  //渲染变量
	}

	//加载页面
	public function display($html = "", $key = "", $val = "")
	{

		//获取视图路径
		$dir = CONTROLLER_NAME;
		$file = empty($html) ? ACTION_NAME : $html;

		//生成视图路径	
		$file_name = VIEW_DIR.'/'.$file.'.php';

		//验证视图是否存在
		if(!file_exists($file_name)){
			die('<h1 align="center">404 找不到视图 '.$file.'.php</h1>');
		}else{
			include $file_name;  //加载视图
		}

		
	}
}
