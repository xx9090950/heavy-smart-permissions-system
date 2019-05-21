<?php
/**
 * 权限节点模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:10
 */

namespace app\api\model;
class Node extends BaseModel
{
    protected $pk='node_id';

    /**
     * 关联角色 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,RoleNode::class);
    }

    /**
     * 关联产品 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,ProductNode::class);
    }
}