<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// $Data = M('Data');
    	// $result=$Data->find(1);
    	// $this->assign('re',$result);


         $event = new \Home\Event\DBEvent('localhost','root','root','Kk');;
        $event->hello();








       

    }
    protected  function login() 
    {
    	
       

    }
    public function mainUser()
    {
       $this->display();
    }
}