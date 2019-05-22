<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/5/22
 * Time: 17:00
 */

namespace app\api\service;

use app\api\model\User as UserModel;

class Group
{
    /**
     * 查询当前用户是否是超管
     * @param $userId
     * @return bool
     */
    static function isSuperAdmin ($userId)
    {

        if (empty($userId)) {
            return false;
        }
        $user=UserModel::get($userId,['groups'],true);
        if (empty($user)) {
            return false;
        }
        $groups= $user->groups;
        foreach ($groups as $group) {
            if ($group['manager_user_id']==$userId&&$group['group_id']==1) {
                return true;
                break;
            }
        }
        return false;
    }
}