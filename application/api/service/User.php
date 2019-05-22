<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/22
 * Time: 10:09
 */

namespace app\api\service;


use app\lib\exception\ParameterException;
use app\api\model\User as UserModel;
use app\lib\exception\UserException;


class User
{
    /**
     * 查询某人拥有哪些权限节点
     * @param $userId
     * @param string $path1
     * @return array
     * @throws ParameterException
     * @throws UserException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getUserNode($userId,$path1="")
    {
        if ($userId==null||empty($userId)) {
            throw new ParameterException("userId不能为空");
        }
        $user=UserModel::with(['roles'=>['nodes']])->select(['user_id'=>$userId]);
        if ($user->isEmpty()) {
            throw new UserException("查询为空");
        }
        $user=$user[0];
        $userNodes=array();
        $roles=$user->roles;
        foreach ($roles as $role) {
            $nodes=$role->nodes;
            foreach ($nodes as $node) {
                if (empty($path1)) {
                    //查询所有节点
                    $userNodes[]=$node;
                }else{
                    //查询某个根节点下的权限
                    if ($node['path1']==$path1) {
                        $userNodes[]=$node;
                    }
                }

            }
        }
        return $userNodes;
    }
}