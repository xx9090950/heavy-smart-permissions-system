<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/22
 * Time: 18:18
 */

namespace app\api\service;


use app\api\model\Node;
use app\api\model\Role as RoleModel;
use app\api\model\User as UserModel;
use app\api\model\Group as GroupModel;
use app\lib\enum\StatusEnum;
use app\lib\enum\UserEnum;
use app\lib\exception\ParameterException;


class Role
{
    /**
     * 关联权限节点到角色
     * @param $roleId
     * @param array $nodeIds
     * @return mixed
     * @author gongruixiang
     * @date 2019-05-23
     * @throws ParameterException
     */
    public function putNodesToRole($roleId, $nodeIds)
    {
        if (empty($roleId)||empty($nodeIds)) {
            throw new ParameterException("参数错误");
        }
        $nodes=Node::all(['node_id'=>$nodeIds,'status'=>StatusEnum::NORMAL]);
        if ($nodes->isEmpty()) {
            throw new ParameterException("权限节点不合法");
        }
        $arrNodeIds=$nodes->column("node_id");
        $role=RoleModel::get($roleId);
        if (empty($roleId)) {
            throw new ParameterException("角色参数错误");
        }
        return $role->nodes()->saveAll($arrNodeIds);
    }

    /**
     * 授权角色给用户
     * @param int $roleId
     * @param array $userIds
     * @return mixed
     * @author gongruixiang
     * @date 2019-05-23
     * @throws ParameterException
     */
    public function putRoleToUsers($roleId,$userIds)
    {
        if (empty($roleId)||empty($userIds)) {
            throw new ParameterException("参数错误");
        }
        $users=UserModel::all(['user_id'=>$userIds,'is_leave'=>UserEnum::ON_THE_JOB]);
        if ($users->isEmpty()) {
            throw new ParameterException("用户id非法");
        }
        $arrUserIds=$users->column("user_id");
        $role=RoleModel::get($roleId);
        if (empty($roleId)) {
            throw new ParameterException("角色参数错误");
        }
        return $role->users()->saveAll($arrUserIds);
    }

    /**
     * 授权角色给组织
     * @param int $roleId
     * @param array $groupIds
     * @author gongruixiang
     * @date 2019-05-23
     * @return mixed
     * @throws ParameterException
     */
    public function putRoleToGroups($roleId,$groupIds)
    {
        if (empty($roleId)||empty($groupIds)) {
            throw new ParameterException("参数错误");
        }
        $groups=GroupModel::all(['group_id'=>$groupIds,'status'=>StatusEnum::NORMAL]);
        if ($groups->isEmpty()) {
            throw new ParameterException("组织id非法");
        }
        $arrGroupIds=$groups->column("group_id");
        $role=RoleModel::get($roleId);
        if (empty($roleId)) {
            throw new ParameterException("角色参数错误");
        }
        return $role->users()->saveAll($arrGroupIds);
    }
}