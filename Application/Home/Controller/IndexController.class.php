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
      function signup()
    {

        if(IS_POST)
        {
            $user = D('User');

            $rules=array(
                array('email','','',0,'unique' ,1),
                array('name','require','名字必须'),
                array('password','require','密码必须'),
                array('email','email','',0,'unique' ,1),
                array('name','','名字必须',0,'unique' ,1)

            );

            $auto=array(
                array('regtime','time',1,'function'),
            );



            if (!$user->auto($auto)->validate($rules)->create($_POST,1)){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                echo ($user->getError());
            }else{

                echo $user->add();
            }









        }
        else
        {
            echo 'no value';
        }

    }

    function signin()
    {
         echo phpinfo();

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