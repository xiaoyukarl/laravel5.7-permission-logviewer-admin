<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CommonController;

/**
 * Description of BaseController
 * Date 2018/7/3
 * @author xiaoyukarl
 */

class BaseController extends CommonController
{

    /**
    $responseCode 响应状态码
    200：OK，标准的响应成功状态码
    201：Object created，用于 store 操作
    204：No content，操作执行成功，但是没有返回任何内容
    206：Partial content，返回部分资源时使用
    400：Bad request，请求验证失败
    401：Unauthorized，用户需要认证
    403：Forbidden，用户认证通过但是没有权限执行该操作
    404：Not found，请求资源不存在
    500：Internal server error，通常我们并不会显示返回这个状态码，除非程序异常中断
    503：Service unavailable，一般也不会显示返回，通常用于排查问题用
     */

    protected $responseCode = 200;
    protected $errCode = 0;
    protected $message = 'success';
    protected $data = [];
    //需要更多的errCode信息,请继续添加
    protected $errCodeList = [
        0=>'success',
        40000=>'请求参数缺失',
        40001=>'token或key不正确',
        40002=>'获取数据失败',
        40004=>'数据为空',
    ];

    /**
     * 设置回复格式
     * @return array
     */
    protected function getApiData()
    {
        if(isset($this->errCodeList[$this->errCode]) && $this->message == 'success'){
            //使用事先定义的错误信息,上一步可以不设置$this->message
            $this->message = $this->errCodeList[$this->errCode];
        }
        return ['code'=>$this->errCode,'message'=>$this->message,'data'=>$this->data];
    }

    /**
     * 统一回复接口json格式内容
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseApi()
    {
        return response()->json($this->getApiData(),$this->responseCode);
    }


}