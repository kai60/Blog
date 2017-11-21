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


            $rules= array(
                array('name','require','名字必须'),
                array('password','require','密码必须'),
                array('repassword','password','确认密码不正确',0,'confirm'),
                array('email','email','邮箱格式不对',0,'unique' ,1)


            );

            $auto= array(
                array('regtime','time',1,'function')
            );






            if (!$user->validate($rules)->auto($auto)->create($_POST,1)){
                // 如果创建失败 表示验证没有通过 输出错误提示信息

                $this->error($user->getError());

            }else{

                $result = $user->add();


                if($result){
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('新增成功', U('Main/homePage'));
                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('新增失败');
                }


            }









        }
        else
        {
            echo 'no value';
        }

    }

    function signin()
    {

        $User=M('User');
        $email=I('post.email');
        $password=I('post.password');

        $condition['email'] = $email;
        $condition['name'] = $email;
        $condition['_logic'] = 'OR';



        $nickname = $User->where($condition)->find();

        if ($nickname["password"]==$password)
        {
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']

            session("user",$nickname);
            $this->success("你好,".$nickname["name"], U('Main/homePage',array('name'=>$nickname["name"])));

        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('密码或者用户名错误');
            session("user",null);
        }

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