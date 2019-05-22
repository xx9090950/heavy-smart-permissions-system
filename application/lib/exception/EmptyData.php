<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11
 * Time: 10:30
 */

namespace app\lib\exception;


class EmptyData extends BaseException
{
    public $code = 200;
    public $msg = '没有找到数据';
    public $errorCode = 10004;
}