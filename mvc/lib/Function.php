<?php

function __autoload($class)
{

	include ROOT_DIR."/lib/".$class.'.php';
}
