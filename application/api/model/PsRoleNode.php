<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:12
 */

namespace app\api\model;


use think\Model;

class PsRoleNode extends Model
{
// 设置当前模型对应的完整数据表名称
    protected $table = 'ps_role_node';

    protected $hidden = ['create_time', 'update_time'];//屏蔽字段
}