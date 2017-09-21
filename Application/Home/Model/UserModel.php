<?php
/**
 * Created by PhpStorm.
 * User: kai
 * Date: 2017/9/16
 * Time: 下午7:27
 */

namespace Home\Model;

use Think\Model;
class UserModel extends  Model
{

    protected $_validate    =   array(
        array('email','','',0,'unique' ,1),
        array('name','require','名字必须'),
        array('password','require','密码必须'),
        array('email','email','',0,'unique' ,1),
        array('name','','名字必须',0,'unique' ,1)

    );
    // 定义自动完成
    protected $_auto    =   array(
        array('regtime','time',1,'function'),
    );
}