<?php
/**
 * Created by PhpStorm.
 * User: 56sing
 * Date: 2018/1/10
 * Time: 16:36
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 200;
    public $msg = '用户不存在';
    public $errorCode = 80000;
}