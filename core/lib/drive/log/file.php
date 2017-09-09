<?php
namespace core\lib\drive\log;
use core\lib\conf;
/**
 * 文件系统日志
 */
class file
{
  public $path; //日志存储位置
  public function __construct()
  {
    $conf = conf::get('OPTION','log');
    $this->path = $conf['path'];
  }

  /**
   * 日志存储
   * 1、确定文件存储位置是否存在
   * 2、不存在则新建目录，存在则写入日志
   */
  public function log($message,$file='log')
  {
    if(!is_dir($this->path.date('YmdH'))){
      mkdir($this->path.date('YmdH'),'0777','true');
    }
    return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
  }
}
