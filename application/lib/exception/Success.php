<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/27 0027
 * Time: 16:57
 */

namespace app\lib\exception;


class Success
{
    public function __construct($msg = '')
    {
        if (!empty($msg)) {
            $this->msg = $msg;
        }
    }

    public $code = 200;
    public $msg = 'success';
    public $errorCode = 0;
}