<?php

namespace App\Http\Middleware;
use App\Models\PermissionModel;
use Closure;
use Spatie\Permission\Models\Role;

/**
 * Description of PermissionMiddleware
 * Date 2018/9/17
 * @author xiaoyukarl
 */

class PermissionMiddleware
{

    public function handle($request, Closure $next)
    {
        if(auth('admin')->user()){
            if (!auth('admin')->user()->hasAnyRole(Role::all())) {
                abort('401','没有权限');
            }
            $this->_checkPermission($request);
            return $next($request);
        }else{
            return redirect()->guest('manage/login');
        }
    }


    protected function _checkPermission($request)
    {
        //错误日志
        if ($request->is('manage/log-viewer') && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo('logviewer')){
            abort('401','没有权限');
        }

        $action = $request->segment(2);

        //特殊不需要检测的控制点不判断
        if(in_array($action,['index','env','log-viewer'])){
            return $this;
        }

        $flag = false;
        $actionNames = [
            $action.'_index',
            $action.'_create',
            $action.'_edit',
            $action.'_delete',
        ];
        $permissions = PermissionModel::all();
        $permissionNames = [];
        foreach($permissions as $permission){
            $permissionNames[] = $permission->name;
        }

        foreach($actionNames as $actionName){
            if(in_array($actionName, $permissionNames)){
                $flag = true;
                break;
            }
        }

        if($flag){
            //权限控制,必须按照规范设置权限和路由
            if ($request->is('manage/'.$action) && $request->method()=='GET' && !auth('admin')->user()->hasPermissionTo($action.'_index')){
                abort('401','没有权限');
            }
            if (($request->is('manage/'.$action.'/create') || ($request->is('manage/'.$action) && $request->method()=='POST')) && !auth('admin')->user()->hasPermissionTo($action.'_create')){
                abort('401','没有权限');
            }
            if (($request->is('manage/'.$action.'/*/edit') || ($request->is('manage/'.$action.'/*') && $request->method()=='PUT'))  && !auth('admin')->user()->hasPermissionTo($action.'_edit')){
                abort('401','没有权限');
            }
            if ($request->is('manage/'.$action.'/*') && $request->method()=='DELETE' && !auth('admin')->user()->hasPermissionTo($action.'_delete')){
                abort('401','没有权限');
            }
        }else{
            abort('401','没有权限');
        }


    }
}