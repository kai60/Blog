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

    //protected $tableName = 'user';
//字段，规则，提示，条件（存在就验证），附加规则，时间
    protected $_validate    =   array(
        array('name','require','名字必须'),
        array('password','require','密码必须'),
        array('repassword','password','确认密码不正确',0,'confirm'),
        array('email','email','邮箱格式不对',0,'unique' ,1)


    );
    // 定义自动完成
    protected $_auto    =   array(
        array('regtime','time',1,'function')
    );
}