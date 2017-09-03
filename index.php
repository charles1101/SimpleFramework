<?php
/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

define('SF',realpath('./')); //根目录

//系统路径
define('CORE',SF.'/core');
define('APP',SF.'/app');
define('MODULE','\app');

define('DEBUG',true); //调试模式
if(DEBUG){
  ini_set('display_errors','On'); //调试模式开启下，打开错误显示开关
}else{
  ini_set('display_errors','Off'); //调试模式关闭下，关闭错误显示开关
}


include CORE.'/common/function.php'; //加载函数库

include CORE.'/simple.php'; //加载核心文件

spl_autoload_register('\core\simple::load'); //实例化类不存在时，加载自动加载类库方法load

\core\simple::run(); //启动框架
