<?php
namespace app\model;
use core\lib\model;
class infoModel extends model
{
  public $table = 'info';
  /**
   * 查询数据
   */
  public function lists()
  {
    $ret = $this->select($this->table,'*');
    return $ret;
  }

  /**
   * 查询一条数据
   */
  public function getOne($id)
  {
    $ret = $this->get($this->table,'*',array(
      'id' => $id
    ));
    return $ret;
  }

  /**
   * 修改一条数据
   */
  public function setOne($id,$data)
  {
    $ret = $this->update($this->table,$data,array(
      'id'=>$id,
    ));
    return $ret;
  }

  /**
   * 删除一条数据
   */
  public function delOne($id)
  {
    $ret = $this->delete($this->table,array(
      'id' => $id,
    ));
  }
}
