<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/22
 * Time: 09:11
 */

namespace app\api\controller;


use app\api\model\User;
use app\api\service\Group;


class Cli
{
    public function test()
    {
//        $userService=new \app\api\service\User();
//        $res=$userService->getUserNode(1);
        $data=(new Group())->getRoleListByGroup();
        dump($data);
    }
}