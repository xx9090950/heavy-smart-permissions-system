<?php
/**
 * 角色模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:12
 */

namespace app\api\model;

class Role extends BaseModel
{
    protected $pk='role_id';


    /**
     * 关联用户 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * 关联权限节点 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function nodes()
    {
        return $this->belongsToMany(Node::class,RoleNode::class);
    }
}