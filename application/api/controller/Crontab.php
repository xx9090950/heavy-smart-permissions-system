<?php
/**
 * Created by PhpStorm.
 * User: gongruixiang
 * Date: 2019/4/15
 * Time: 20:21
 */

namespace app\index\controller;


class Crontab
{
    public function addGoods()
    {
        //设定商品数量
        $count=30;
        $listKey="2019_04_15_goods_list";
        //创建连接redis对象
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        for ($i=1;$i<=$count;$i++){
            //将商品id push到列表中
            $redis->rPush($listKey,$i);
        }
    }
}