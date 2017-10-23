<?php
/**
 * Created by PhpStorm.
 * User: Kai
 * Date: 2017/10/13
 * Time: 10:37
 */

namespace Home\Controller;


use Think\Controller;

class MainController extends Controller
{
  function homePage($name='')
  {
      $this->assign('name',$name);
      $this->display();
  }

  function writer()
  {
      $this->display();
  }

  function postblog()
  {
      $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
      //echo json_encode($arr);
      //echo json_encode( I('POST.'));


     echo  I('POST.title');
  }
}