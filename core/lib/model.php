<?php
namespace core\lib;
use core\lib\config;
/**
 * 模型类
 */
class model extends \Medoo\Medoo
{
  /**
   * 构造函数。连接数据库
   */
  public function __construct()
  {
    $opition =  conf::all('db');
    parent::__construct($opition);
  }
}
