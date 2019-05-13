<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/11/14
 * Time: 21:51
 */

namespace app\lib\exception;

//用于继承tp5的全局异常处理类,用来重写其中的render方法来做最终的异常处理

use think\exception\Handle;
use Exception;
use think\facade\Log;

//总的异常处理类
class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render(Exception $e)
    {
        //如果这个传入的异常类是我们自定义的异常类的话,就说明这个异常在我们的控制之中
        if ($e instanceof BaseException) {
            //将该异常设定好的属性给赋值到总的异常处理类
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            //判断配置中的debug是否开启确定开发或生产模式
            if (config('app_debug')) {
                //如果是开发模式
                return parent::render($e);

            } else {
                //如果是生产模式,则返回与设定好的未知错误的json
                $this->code = 200;
                $this->msg = '系统异常';
                $this->errorCode = 999;
                //全局的记录日志
                $this->recordErrorLog($e);
            }

        }
        $request = request();
        $result = [
            'errorCode' => $this->errorCode,
            'msg' => $this->msg,
            'url' => $request->baseUrl()
        ];
        //返回异常信息到客户端
        return json($result, $this->code);
    }

    /**
     * @param $e
     * 传入异常对象
     */
    private function recordErrorLog(Exception $e)
    {
        //记录日志,传入异常的信息
        Log::record($e->getMessage(), 'error');
    }
}