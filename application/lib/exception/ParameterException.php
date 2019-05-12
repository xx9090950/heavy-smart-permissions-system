<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/19
 * Time: 11:03
 */

namespace app\lib\exception;

//参数错误异常
class ParameterException extends BaseException
{
    public $code = 200;
    public $msg = '参数错误';
    public $errorCode = 10002;
}