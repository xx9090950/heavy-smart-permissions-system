<?php
/**
 * Created by PhpStorm.
 * User: 56sing
 * Date: 2018/1/11
 * Time: 15:29
 */

namespace app\lib\exception;


class SuccessMessage
{
    public function __construct($msg = '')
    {
        if (!empty($msg)) {
            $this->msg = $msg;
        }
    }

    public $code = 201;
    public $msg = 'success';
    public $errorCode = 0;
}