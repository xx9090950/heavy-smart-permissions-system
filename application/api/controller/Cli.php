<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/22
 * Time: 09:11
 */

namespace app\api\controller;


use app\api\model\User;


class Cli
{
    public function test()
    {
        $userService=new \app\api\service\User();
        $userService->getUserNode(1);
    }
}