<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/21
 * Time: 16:10
 */

namespace app\api\model;


use think\Model;

class PsProduct extends Model
{
    protected $pk = 'product_id';//主键

// 设置当前模型对应的完整数据表名称
    protected $table = 'ps_product';

    protected $hidden = ['create_time', 'update_time'];//屏蔽字段
}