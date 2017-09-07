<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Data = M('Data');
    	$result=$Data->find(1);
    	$this->assign('re',$result);


        $event = new \Home\Event\DBEvent();
       // $event->hello();




        $event = A('DB','Event');
        $event->initDB();






        //$this->display();

       

    }
    protected  function login() 
    {
    	
       

    }
    public function mainUser()
    {
       $this->display();
    }
}