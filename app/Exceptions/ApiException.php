<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2018/9/20
 * Time: 17:22
 */
Class ApiException extends \App\Exceptions\Handler
{

    public function render($request, \Exception $exception)
    {
        if ($exception && !env('APP_DEBUG')) {
            //其他错误
            $data['code'] = 4000;
            $statusCode = 404;
            $data['data'] = [];
            if($exception instanceof HttpException){
                $statusCode = $exception->getStatusCode();
            }
            $data['message'] = $exception->getMessage();
            return response()->json($data,$statusCode,[]);
        }
        return parent::render($request, $exception);
    }
}