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
  function homePage($name='author')
  {



      $blog = M("Blog"); // 实例化User对象
      $condition['author'] = $name;
// 把查询条件传入查询方法
     $blogList= $blog->where($condition)->order('create_time desc')->select();



      $this->assign('blogList',$blogList);





      $this->display();
  }

  function writer()
  {
      $this->display();
  }

  function postblog()
  {

   
    $out = array();

        if(IS_POST)
        {
            $blog = D('Blog');

            $user=session('user');

            $data=$_POST;
            $data['user_id']=$user['user_id'];
            $data['author']=$user['name'];
            //$time = time();
            $dt = date("Y-m-d H:i:s",time());
            $data['create_time']=$dt;


            $result=$blog->add($data);




                


                if($result)
                {
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $out['status']=1;
                    $out['url']=U('homePage','name='.$user['name']);
                    $out['message']='文章发布成功!';
                } else 
                {
                    $out['status']=0;
                    $out['url']=U('homePage','name='.$user['name']);
                    $out['message']='文章发布失败!';
                }






        }
        else
        {
           
        }

        echo json_encode($out);

  }
}