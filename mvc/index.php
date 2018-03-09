 <?php 


define('ROOT_DIR', dirname(__FILE__));   //定义项目根目录常量

// $controller = $_GET['c'].'controller'; //控制器名

// include ROOT_DIR.'/app/controller/'.$controller.'.php';  //加载控制器

// $method = $_GET['a'];  //方法名

// $action = new $controller;   //实例化控制器类

// $action->$method();   //加载方法

include ROOT_DIR.'/lib/controller.php';   //加载初始化文件

$mvc = new controller();   // 实例化控制器类

$mvc->init();
