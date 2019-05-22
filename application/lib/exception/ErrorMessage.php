<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/27 0027
 * Time: 17:13
 */

namespace app\lib\exception;


class ErrorMessage extends BaseException
{
    public $code = 202;
    public $msg = '操作错误';
}