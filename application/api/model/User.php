<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:13
 */

namespace app\api\model;




class User extends BaseModel
{
    protected $pk='user_id';

    /**
     * 关联角色 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,RoleUser::class);
    }

    /**
     * 关联组织 多对多
     * @return \think\model\relation\BelongsToMany
     */
    public function Groups()
    {
        return $this->belongsToMany(Group::class,GroupUser::class) ;
    }

}