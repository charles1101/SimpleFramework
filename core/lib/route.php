<?php
namespace core\lib;
use core\lib\conf;
/**
 * 路由类
 */
class route
{
  public $ctrl;
  public $action;
  /**
   * 构造函数
   * 1、隐藏index.php。如xxx.com/index.php/index/index转换成xxx.com/index/index
   * 2、$_SERVER['REQUEST_URI']获取URL的参数部分。如/index/index
   * 3、返回对应控制器的方法
   */
  public function __construct()
  {
    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/'){
      //隐藏index.php
      $path = $_SERVER['REQUEST_URI'];
      $patharr = explode('/',trim($path,'/'));
      if(isset($patharr[0])){
        $this->ctrl = $patharr[0];
      }
      unset($patharr[0]);
      if(isset($patharr[1])){
        $this->action =$patharr[1];
        unset($patharr[1]);
      }else{
        $this->action = conf::get('ACTION','route');
      }
      //URL多余部分转换成GET方法。如id/1/str/2/test/3
      $count = count($patharr) + 2;
      $i = 2;
      while($i < $count){
        if(isset($patharr[$i + 1])){
          $_GET[$patharr[$i]] = $patharr[$i + 1];
        }
        $i = $i + 2;
      }
    }else{
      $this->ctrl = conf::get('CTRL','route');
      $this->action = conf::get('ACTION','route');
    }
  }
}
