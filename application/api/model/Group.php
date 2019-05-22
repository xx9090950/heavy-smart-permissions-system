<?php
/**
 * 组织模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:02
 */

namespace app\api\model;

class Group extends BaseModel
{
    protected $pk='group_id';

    /**
     * 关联模型用户 多对多
     */
    public function users()
    {
        return $this->belongsToMany(User::class,GroupUser::class);
    }

    /**
     * 关联角色 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany(Role::class,RoleGroup::class);
    }
}