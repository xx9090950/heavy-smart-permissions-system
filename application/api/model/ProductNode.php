<?php
/**
 * 产品和权限节点关联模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:11
 */

namespace app\api\model;



use think\model\Pivot;

class ProductNode extends Pivot
{
    protected $pk='id';
}