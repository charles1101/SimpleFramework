<?php
namespace core\lib;
use core\lib\conf;
/**
 * 日志类
 * 1、确定日志的存储方式
 * 2、写日志
 */
class log
{
  public static $class;
  /**
   * 初始化方法，确定存储方式
   */
  public static function init()
  {
    $drive = conf::get('DRIVE','log');
    $class = '\core\lib\drive\log\\'.$drive;
    self::$class = new $class;
  }

  public static function log($name,$file = 'log')
  {
    self::$class -> log($name,$file);
  }
}
