<?php
namespace app\ctrl;
use core\lib\model;
/**
 * 控制器类。类名与方法名重复时，方法会变成初始化的方法，所以类名用indexCtrl
 */
class indexCtrl extends \core\simple
{
  /**
   * 渲染模板
   */
  public function index()
  {
    $data = 'hello world';
    $assign = $this->assign('data',$data);
    $this->display('index.html');
  }

  public function test()
  {
    $data = 'test';
    $assign = $this->assign('data',$data);
    $this->display('test.html');
  }
}
