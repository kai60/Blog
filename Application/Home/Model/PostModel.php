<?php
/**
 * Created by PhpStorm.
 * User: kai
 * Date: 2017/9/16
 * Time: 下午7:28
 */

namespace Home\Model;
use Think\Model;

class PostModel extends  Model
{
    protected $_validate    =   array(
        array('title','require','标题必须'),
    );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',1,'function'),
    );
}