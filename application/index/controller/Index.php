<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function kill()
    {
        //假装是用户的唯一标识
        $uuid=md5(uniqid('user').time());
        //创建连接redis对象
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $listKey="2019_04_15_goods_list";
        $orderKey="2019_04_15_buy_order";
        $failUserNum="2019_04_15_fail_user_num";
        if ($goodsId=$redis->lPop($listKey)) {
            //秒杀成功
            //将幸运用户存在集合中
            $redis->hSet($orderKey,$goodsId,$uuid);
        }else{
            //秒杀失败
            //将失败用户计数
            $redis->incr($failUserNum);
        }
        echo "SUCCESS";
    }
}
