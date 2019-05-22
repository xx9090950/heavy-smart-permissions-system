<?php
/**
 * 组织和权限节点中间模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:09
 */

namespace app\api\model;
use think\model\Pivot;

class GroupNode extends Pivot
{
    protected $pk='id';
}