<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/9
 * Time: 16:21
 */

namespace app\lib\exception;


class Login extends BaseException
{
    public $code = 200;
    public $msg = '用户账号或密码错误';
    public $errorCode = '20001';
}