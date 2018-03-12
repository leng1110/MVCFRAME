<?php
header("content-type:text/html;charset=utf-8");

class DemoController extends controller
{
    public function index()
    {

		$source = Model('TextModel')->query("select * from user where user_id=1");
		$data = $source->fetch();
		var_dump($data);

   		$this->display('demo');
   		
    }



}