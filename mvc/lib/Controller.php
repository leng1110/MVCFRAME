<?php

include ROOT_DIR.'/lib/function.php';

class controller{

	public $config;	//配置信息
	static public $view;	//视图对象

	//初始化框架
	public function init(){

		define('CONTROLLER_DIR', ROOT_DIR.'/app/controller');	//控制器
		define('MODEL_DIR', ROOT_DIR.'/app/model');	//模型
		define('VIEW_DIR', ROOT_DIR.'/app/view');	//视图
		define('CONFIG_DIR', ROOT_DIR.'/config');	//配置文件

		
		$this->config = require CONFIG_DIR.'/config.php'; //加载配置文件

		self::$view = new view();    //初始化视图对象

		
		$this->get_url(); //解析出控制器方法
		
		//调用控制器方法
		$this->controller_action(CONTROLLER_NAME, ACTION_NAME);		
			
	}

	//初始化控制器方法
	public function controller_action($controller, $action){

		//判断类文件是否存在
		if(!file_exists(CONTROLLER_DIR.'/'.$controller.'.php')){
			exit('<h3>控制器文件不存在</h3>');
		}

		//引入类文件
		include CONTROLLER_DIR.'/'.$controller.'.php';

		//验证控制器是否存在
		if(!class_exists($controller)){
			exit('<h3>控制器不存在</h3>');
		}

		$obj = new $controller;
		call_user_func(array($obj, $action));
	}

	//分类路由
	public function get_url(){

		//验证是否发送指定控制器方法
		if(isset($_SERVER['PATH_INFO'])){
			//获取控制器和方法
			$str = trim($_SERVER['PATH_INFO'], '/');
			$arr = explode('/', $str);
		}else{
			$arr[] = $this->config['default_controller'];			
			$arr[] = $this->config['default_action'];			
		}

		//定义当前控制器方法常量
		define('CONTROLLER_NAME', $arr[0]);
		define('ACTION_NAME', $arr[1]);

	}

	public function display($data = ""){
		self::$view->display($data);
	}

	public function assign($key, $val){	
		self::$view->assign($key, $val);
	}
}