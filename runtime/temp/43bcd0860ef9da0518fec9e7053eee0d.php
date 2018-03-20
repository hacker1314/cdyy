<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\xampp\htdocs\cdyy\public/../application/register\view\index\finalreg.html";i:1521508417;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>恭喜您注册成功-宁德师范学院-场地预约管理系统</title>
        <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    </head>
    <body>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <div class="layui-container">
            <div class="layui-row" style="height: 97px">
                <div class="layui-col-md3">
                    <img src="/static/login/logo.png" style="margin-top: 20px;">
                </div>
            </div>
        </div>
        <div class="layui-bg-blue" style="height:3px; min-width:1024px"></div>
        <div style="background-image: url(/static/login/bg.png); background-size:cover; min-width:1024px;height: 800px">
            <div style="height:100px">
                <div style="color: #01AAED;padding-top: 40px;padding-left: 72%;"><i class="layui-icon">&#xe65b;</i>&nbsp;&nbsp;已有账号了？&nbsp;&nbsp;<a style=" color: #01AAED; border-style: solid;border-color:#01AAED;border-width:1px;padding-right: 10px;padding-bottom: 7px;padding-left: 10px;padding-top: 7px;" href="/login">登录</a></div>
            </div>
            <div style=" background-color: #FfFfFf; margin-left:auto;margin-right:auto; height: 400px;width: 1000px">
                <div style="margin-left:auto;margin-right:auto; width: 800px; margin-bottom: 20px;"><img src="/static/login/reg3.png" ></div>
                <!--<div style="margin-left:auto;margin-right:auto; width: 600px; height: 50px;margin-bottom: 20px; background: #bce8f1;color: #31708f;border-color: #bce8f1;border-style: solid;border-width: 1px">
                    
                </div> !-->
                <div style="margin-left:auto;margin-right:auto;width: 600px; height: 50px;margin-bottom: 30px;">
                    <span class="layui-badge" style="width: 600px; height: 50px; margin-bottom: 20px; background: #bce8f1;color: #31708f;border-color: #bce8f1;border-style: solid;border-width: 1px">
                        <p style="font-size: 15px;padding-top: 15px;">恭喜您已经成功注册宁德师范学院-场地预约管理系统！请等待管理员审核您的资格！</p>
                    </span>
                    
                </div>
                <div style="margin-left:auto;margin-right:auto;width: 100px;"><a href="/index">返回首页</a></div>
            </div>
            <div style="height:80px">
            </div>
        </div>
        <div class="layui-footer">
            <!-- 底部固定区域 -->
            © ndsy.cn - 宁德师范学院 - 场地预约管理系统
        </div>


        <script src="/static/layui/layui.js"></script>
        <script>
                            //一般直接写在一个js文件中
                            layui.use(['layer', 'form', 'element'], function () {
                                var element = layui.element;
                                var $ = layui.$
                                        , layer = layui.layer;
                                var layer = layui.layer
                                        , form = layui.form;
                                form.verify({
                                    pass: [
                                        /^[\S]{6,20}$/
                                                , '密码必须6到20位，且不能出现空格'
                                    ]
                                    , username: ([
                                        /^[\S]{2,24}$/
                                                , '用户名必须2到24位，且不能出现空格'
                                    ])
                                    , code: ([
                                        /^[\S]{6}$/
                                                , '验证码为6位！'
                                    ])
                                })
                            });
        </script> 
    </body>
</html>