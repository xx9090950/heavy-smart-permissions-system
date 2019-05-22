<?php
/**
 * 角色和组织授权模型
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/21
 * Time: 16:59
 */

namespace app\api\model;


use think\model\Pivot;

class RoleGroup extends Pivot
{
    protected $pk='id';
}