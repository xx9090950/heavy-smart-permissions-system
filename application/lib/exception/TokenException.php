<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/1/4
 * Time: 21:32
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 200;
    public $msg = 'The token is expired or invalid';
    public $errorCode = 70000;
}