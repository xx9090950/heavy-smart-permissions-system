<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/8
 * Time: 21:27
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 创建对象方法
     * @return mixed
     */
    public static function instance()
    {
        $className = get_called_class();
        return new $className();
    }

    /**
     * 获取传递参数，并验证
     * @return array
     * @throws Exception
     * @throws ParameterException
     */
    public function goCheck()
    {
        //接收参数
        $request = Request::instance();
        //通过param方法获取到所有的参数
        $params = $request->param();
        //由哪个对象来调用goCheck方法,就是由哪个对象来调用check方法,将接收的所有参数传递进去
        $result = $this->batch()->check($params);
        if (!$result) {
            //如果结果为false,调用getError方法获取错误信息
            $error = $this->getError();
            //对数组整理成字符串
            $error = implode('                          ，                                ', $error);
            //抛出参数错误异常
            throw new ParameterException(['msg' => $error]);
        } else {
            //调用获取过滤参数的方法，返回给控制器
            return $this->getDataByRule($params);
        }
    }

    /**
     * 判断传入的$value 是否是正整数
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function positiveInt($value, $rule = '', $data = '', $field = '')
    {
        //如果是正整数,且大于0
        if (is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 判断传入的$value 是否为空
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function isEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 根据验证器来获取客户端传递的信息
     * @param $arrays
     * @return array
     */
    protected function getDataByRule($arrays)
    {

        $newArr = [];
        foreach ($this->rule as $key => $value) {
            if (array_key_exists($key, $arrays)) {
                $newArr[$key] = $arrays[$key];
            }
        }
        return $newArr;
    }

    /**
     * 判断是否以逗号分割的字符串传入,且id必须为正整数
     * @param $value
     * @return bool
     */
    protected function idsCheck($value)
    {
        $arrValue = explode(',', $value);
        if (empty($arrValue)) {
            return false;
        }
        foreach ($arrValue as $v) {
            if (!$this->positiveInt($v)) {
                return false;
            }
        }
        return true;
    }

    protected $field = [

    ];
}