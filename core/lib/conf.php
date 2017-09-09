<?php
namespace core\lib;
/**
 * 配置加载类
 * 1、判断配置文件是否存在
 * 2、判断配置是否存在
 * 3、缓存配置
 */
class conf
{
  public static $conf = array();

  /**
   * 加载配置文件中的配置项
   */
  public static function get($name,$file)
  {
    if(isset(self::$conf[$file])){
      return self::$conf[$file][$name];
    }else{
      $path = CORE.'/config/'.$file.'.php';
      if(is_file($path)){
        $conf = include $path;
        if(isset($conf[$name])){
          self::$conf[$file] = $conf;
          return $conf[$name];
        }else{
          throw new \Exception('无配置项'.$name);
        }
      }else{
        throw new \Exception('找不到配置文件'.$file);
      }
    }
  }

  /**
   * 加载整个配置文件
   */
  public static function all($file)
  {
    if(isset(self::$conf[$file])){
      return self::$conf[$file];
    }else{
      $path = CORE.'/config/'.$file.'.php';
      if(is_file($path)){
        $conf = include $path;
        self::$conf[$file] = $conf;
        return $conf;
      }else{
        throw new \Exception('找不到配置文件'.$file);
      }
    }
  }
}
