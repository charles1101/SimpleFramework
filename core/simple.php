<?php
namespace core;
/**
 * 核心文件
 */
class simple
{
  public static $classMap = array();
  public $assign;

  /**
   * 启动框架
   */
  public static function run()
  {
    \core\lib\log::init();
    $route = new \core\lib\route(); //实例化路由类
    $ctrlClass = $route->ctrl;
    $action = $route->action;
    $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
    $cltrlClass = MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
    if(is_file($ctrlFile)){
      include $ctrlFile;
      $ctrl = new $cltrlClass();
      $ctrl->$action();
      \core\lib\log::log('ctrl:'.$ctrlClass.'    '.'action'.$action);
    }else{
      throw new \Exception('找不到控制器'.$ctrlClass);
    }
  }

  /**
   * 自动加载类库
   */
  public static function load($class)
  {
    //判断$classMap数组中是否有$class类，避免重复引入
    if(isset($classMap[$class])){
      return true;
    }else{
      //$classMap中无$class，则自动加载$class
      $class = str_replace('\\','/',$class); //如$class = \core\route转换成SF.'/core/route.php'
      $file = SF.'/'.$class.'.php';
      if(is_file($file)){
        include $file;
        self::$classMap[$class] = $class; //将$class放入$class中
      }else{
        return false;
      }
    }
  }

  /**
   * 模板变量赋值
   */
  public function assign($name,$value)
  {
    $this->assign[$name] = $value;
  }

  /**
   * 输出模板文件
   */
  public function display($file)
  {
    $path = APP.'/views/'.$file ;
    $loader = new \Twig_Loader_Filesystem(APP.'/views');
    $twig = new \Twig_Environment($loader, array(
      'cache' => SF.'/cache/twig',
      'debug' => DEBUG
    ));
    $template = $twig->load($file);
    $template->display($this->assign?$this->assign:array());
  }
}
