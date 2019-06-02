@extends('manage.layout.frame')

@section('content')
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">{{ auth('admin')->user()->name }}</span>
            <span>！当前时间:{{date('Y-m-d')}}</span>
        </blockquote>
        <!--<fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>66</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>回复数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                    <tr>
                        <td >
                            <a class="x-a" href="/" target="_blank">新版x-admin 2.0上线了</a>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <a class="x-a" href="/" target="_blank">交流qq群:(519492808)</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        -->
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                    @foreach($envs as $env)
                    <tr>
                        <th>{{$env['name']}}</th>
                        <td>{{$env['value']}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </fieldset>
        <!--
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                    <tr>
                        <th>版权所有</th>
                        <td>xxxxx(xxxx)
                            <a href="http://www.xxx.com/" class='x-a' target="_blank">访问官网</a></td>
                    </tr>
                    <tr>
                        <th>开发者</th>
                        <td>马志斌(113664000@qq.com)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        -->
    </div>
@endsection
