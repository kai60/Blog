<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// $Data = M('Data');
    	// $result=$Data->find(1);
    	// $this->assign('re',$result);


         $event = new \Home\Event\DBEvent(C('DB_HOST').':'.C('DB_PORT'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'));

         $this->display();








       

    }
    protected  function login() 
    {
    	
       

    }
    public function mainUser()
    {
       $this->display();
    }

    public function showvar()
    {
        $this->display();
    }
}