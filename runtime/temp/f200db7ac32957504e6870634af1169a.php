<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\cdyy\public/../application/register\view\index\index.html";i:1521474274;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>注册-宁德师范学院-场地预约管理系统</title>
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
            <div style=" background-color: #FfFfFf; margin-left:auto;margin-right:auto; height: 600px;width: 1000px">
                <div style="margin-left:auto;margin-right:auto; width: 800px; margin-bottom: 20px;"><img src="/static/login/head1.png" ></div>
                <form class="layui-form " action="/register/index/check" method="get" style="margin-left:auto;margin-right:auto;width: 500px">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" required lay-verify="required|username" placeholder="请输入个人姓名或社团名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请填写个人姓名或社团名</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" required lay-verify="required|email" placeholder="请输入邮箱地址" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请填写正确的邮箱地址</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="phone" required lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请填写11位有效的手机号码</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password1" required lay-verify="required|pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">6-20位英文/数字/字符的组合</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password2" required lay-verify="required|pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请再输入一遍上面的密码</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">验证码：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="code" required lay-verify="required|code" placeholder="请输入验证码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-word-aux"><img src="<?php echo captcha_src(); ?>" alt="captcha" style="width: 150px" /></div>
                    </div>
                    <div class="layui-form-item" >
                        <div style="margin-left:auto;margin-right:auto; width: 280px">
                            <button class="layui-btn" lay-submit lay-filter="loginnow" >立即注册</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>

                </form>
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
                        /^[\S]{4,4}$/
                                , '验证码为4位！'
                    ])
                })
            });
        </script> 
    </body>
</html>