<?php
/**
 * Created by PhpStorm.
 * User: Kai
 * Date: 2017/10/13
 * Time: 10:37
 */

namespace Home\Controller;


use Think\Controller;
require 'vendor/autoload.php';
use JasonGrimes\Paginator;

class MainController extends Controller
{
  function homePage($name='author',$pagesize=2,$pageindex=1)
  {



      $blog = M("Blog"); // 实例化User对象

      $firstBlog_id = $blog->field('blog_id')->order('blog_id desc')->limit(1)->select();
//获取最新一条id 进行分页
      $newestBlog=$firstBlog_id[0]['blog_id'];
      print_r($newestBlog);
      $condition['author'] = $name;
      $condition['blog_id']=array('ELT',$newestBlog-($pageindex-1)*$pagesize);

// 把查询条件传入查询方法
     $blogList= $blog->where($condition)->order('create_time desc')->limit($pagesize)->select();

     $count=$blog->count('*');




      $paginator = $this->pages($count,$pagesize,$pageindex);

      $this->assign('blogList',$blogList);
      $this->assign('paginator',$paginator);






      $this->display();
  }


    /**
     * @param $totalRecord
     * @param $pageSize
     * @param $page
     * @return Paginator
     */
    protected function pages($totalRecord, $pageSize, $page)
    {
        $parameter  = $_GET;
        $parameter['pageindex'] = '(:num)';

       // print_r($parameter);
        $urlPattern = U(ACTION_NAME, $parameter);
        //echo $urlPattern;
        $urlPattern = str_replace(urlencode('(:num)'),'(:num)',$urlPattern);
        $paginator = new Paginator($totalRecord, $pageSize, $page,$urlPattern);
        $paginator->setPreviousText('上一页');
        $paginator->setNextText('下一页');
        return $paginator;
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