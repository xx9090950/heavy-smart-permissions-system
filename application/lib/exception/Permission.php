<?php
/**
 * Created by PhpStorm.
 * User: 56sing
 * Date: 2018/1/15
 * Time: 21:00
 */

namespace app\lib\exception;


class Permission extends BaseException
{
    public $code = 200;
    public $msg = '账号权限不足';
    public $errorCode = 80001;
}