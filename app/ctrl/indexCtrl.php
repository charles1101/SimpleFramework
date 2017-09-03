<?php
namespace app\ctrl;
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
    $title = '视图文件';
    $this->assign('title',$title);
    $this->assign('data',$data);
    $this->display('index.html');
  }
}
