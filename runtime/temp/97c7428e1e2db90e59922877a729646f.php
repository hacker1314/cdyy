<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\cdyy\public/../application/register\view\index\checkshow.html";i:1521474939;}*/ ?>
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
            <div style=" background-color: #FfFfFf; margin-left:auto;margin-right:auto; height: 400px;width: 1000px">
                <div style="margin-left:auto;margin-right:auto; width: 800px; margin-bottom: 20px;"><img src="/static/login/reg2.png" ></div>
                <!--<div style="margin-left:auto;margin-right:auto; width: 600px; height: 50px;margin-bottom: 20px; background: #bce8f1;color: #31708f;border-color: #bce8f1;border-style: solid;border-width: 1px">
                    
                </div> !-->
                <div style="margin-left:auto;margin-right:auto;width: 600px; height: 50px;margin-bottom: 30px;">
                    <span class="layui-badge" style="width: 600px; height: 50px; margin-bottom: 20px; background: #bce8f1;color: #31708f;border-color: #bce8f1;border-style: solid;border-width: 1px">
                        <p style="font-size: 15px;padding-top: 15px;">验证码已发送至您手机，请输入邮件中的验证码，确保您的邮箱可以及时收到邮件。</p>
                    </span>
                </div>
                <form class="layui-form " action="" method="post" style="margin-left:auto;margin-right:auto;width: 500px">
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱：</label>

                        <div class="layui-form-mid layui-word-aux" style="color: #1997d7"><?php echo $email; ?></div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">验证码：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" required lay-verify="required|username" placeholder="请输入邮箱的验证码" autocomplete="off" class="layui-input">
                        </div><button id="rebtn" type="reset" class="layui-btn layui-btn-primary" href="javascript:void(0);" onclick='javascript:resend()'>重发验证码</button>
                        <div class="layui-form-mid layui-word-aux"></div>
                    </div>
                    <div class="layui-form-item" >
                        <div style="margin-left:auto;margin-right:auto; width: 280px">
                            <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="loginnow" >立即注册</button>
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
                                    , username: ([
                                        /^[\S]{4,4}$/
                                                , '验证码为4位！'
                                    ])
                                })
                            });
        </script> 
        <script>
            function resend() {
                var layer = layui.layer;
                layer.msg('验证码已经重新发送！');
                var hrefDom = document.getElementById("rebtn");
                hrefDom.className += " layui-btn-disabled";
                hrefDom.onclick = "";
                var $ = layui.$;
                $.post("/register/index/resend", { mail: "<?php echo $email; ?>"} );
                setTimeout('ok()', 60000);
            }
            function ok() {
                var hrefDom = document.getElementById("rebtn");
                hrefDom.className = "layui-btn layui-btn-primary";
                hrefDom.onclick = resend;
            }
        </script>
    </body>
</html>