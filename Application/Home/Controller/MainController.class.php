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



      $blog = M("Blog"); // 实例化User对象
      $condition['author'] = 'author';
// 把查询条件传入查询方法
     $blogList= $blog->where($condition)->select();


      $this->assign('name',$name);
      $this->assign('blogList',$blogList);

      //var_dump($blogList);




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


            if (!$blog->create($_POST,1))
            {
                // 如果创建失败 表示验证没有通过 输出错误提示信息

               
                $out['error']=$blog->getError();

            }else
            {

                $result = $blog->add();

                


                if($result)
                {
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                   
                    $out = array('status' =>1 ,'url'=>U('homePage'),'message'=>'message!' );
                    $out['status']=1;
                    $out['url']=U('homePage');
                    $out['message']='文章发布成功!';
                } else 
                {
                    $out['status']=0;
                    $out['url']=U('homePage');
                    $out['message']='文章发布失败!';
                }


            }



        }
        else
        {
           
        }

        echo json_encode($out);

  }
}