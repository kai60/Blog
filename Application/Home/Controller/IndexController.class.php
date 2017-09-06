<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Data = M('Data');
    	$result=$Data->find(1);
    	$this->assign('re',$result);
        $this->display();

       

    }
    public function hello()
    {
    	echo "hello";

        echo __ROOT__;
        echo '<br>';
        echo __APP__;
        echo '<br>';
        echo __MODULE__;
        echo '<br>';
        echo __CONTROLLER__;
        echo '<br>';
        echo __ACTION__;
        echo '<br>';
        echo '__PUBLIC__';
        echo '<br>';
        echo __URL__;
       

    }
    public function mainUser()
    {
       $this->display();
    }
}