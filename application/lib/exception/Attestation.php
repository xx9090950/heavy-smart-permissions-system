<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/7
 * Time: 17:48
 */

namespace app\lib\exception;


class Attestation extends BaseException
{
    public $code = 200;
    public $msg = '验签失败';
    public $errorCode = 500;
}