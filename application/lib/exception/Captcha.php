<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/9
 * Time: 16:14
 */

namespace app\lib\exception;


class Captcha extends BaseException
{
    public $code = 200;
    public $msg = '验证码错误';
    public $errorCode = '10003';
}