<?php
/**
 * 产品模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:10
 */

namespace app\api\model;

class Product extends BaseModel
{
    protected $pk='product_id';

    /**
     * 关联权限节点 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function nodes()
    {
        return $this->belongsToMany(Node::class,ProductNode::class);
    }
}