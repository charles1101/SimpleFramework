<?php
namespace core\lib;
/**
 * 模型类
 */
class model extends \PDO
{
  /**
   * 构造函数。连接数据库
   */
  public function __construct()
  {
    $dsn = 'mysql:host=localhost;dbname=test';
    $username = 'root';
    $passwd = '0926';
    try{
        parent::__construct($dsn, $username, $passwd);
    }catch (\PDOException $e){
        p($e->getMessage());
    }
  }
}
