<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\wamp64\www\tp\public/../application/admin\view\index\index.html";i:1519442349;s:57:"D:\wamp64\www\tp\application\admin\view\index\header.html";i:1519442038;s:57:"D:\wamp64\www\tp\application\admin\view\index\footer.html";i:1519441589;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>宁德师范学院-场地预约系统-后台管理系统</title>
        <link rel="stylesheet" href="/static/layui/css/layui.css">
    </head>
    <body class="layui-layout-body">
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
                <div class="layui-logo">宁师场地预约系统</div>
                <!-- 头部区域（可配合layui已有的水平导航） -->
                <ul class="layui-nav layui-layout-left">
                    <li class="layui-nav-item"><a href="">控制台</a></li>
                    <li class="layui-nav-item"><a href="">商品管理</a></li>
                    <li class="layui-nav-item"><a href="">用户</a></li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">其它系统</a>
                        <dl class="layui-nav-child">
                            <dd><a href="">邮件管理</a></dd>
                            <dd><a href="">消息管理</a></dd>
                            <dd><a href="">授权管理</a></dd>
                        </dl>
                    </li>
                </ul>
                <ul class="layui-nav layui-layout-right">
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <?php echo $name; ?>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="">基本资料</a></dd>
                            <dd><a href="">安全设置</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a href="<?php echo url('exitadmin'); ?>">退出</a></li>
                </ul>
            </div>

            <div class="layui-side layui-bg-black">
                <div class="layui-side-scroll">
                    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                    <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">所有商品</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:;">列表一</a></dd>
                                <dd><a href="javascript:;">列表二</a></dd>
                                <dd><a href="javascript:;">列表三</a></dd>
                                <dd><a href="">超链接</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a href="javascript:;">解决方案</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:;">列表一</a></dd>
                                <dd><a href="javascript:;">列表二</a></dd>
                                <dd><a href="">超链接</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item"><a href="">云市场</a></li>
                        <li class="layui-nav-item"><a href="">发布商品</a></li>
                    </ul>
                </div>
            </div>

            <div class="layui-body">
                <!-- 内容主体区域 -->
                <div style="padding: 15px;"><div class="layui-tab">
                        <ul class="layui-tab-title">
                            <li class="layui-this">网站设置</li>
                            <li>用户管理</li>
                            <li>权限分配</li>
                            <li>商品管理</li>
                            <li>订单管理</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                1. 高度默认自适应，也可以随意固宽。
                                <br>2. Tab进行了响应式处理，所以无需担心数量多少。
                            </div>
                            <div class="layui-tab-item">内容2</div>
                            <div class="layui-tab-item">内容3</div>
                            <div class="layui-tab-item">内容4</div>
                            <div class="layui-tab-item">内容5</div>
                        </div>
                    </div></div>
            </div>
        <script src="/static/layui/layui.js"></script>
        <script>
            //JavaScript代码区域
            layui.use('element', function () {
                var element = layui.element;

            });
            layui.use(['layer', 'form'], function () {
                var layer = layui.layer
                        , form = layui.form;
                layer.msg('登录成功！');
            });
        </script>
                    <div class="layui-footer">
                <!-- 底部固定区域 -->
                © ndsy.cn - 宁德师范学院 - 场地预约管理系统
            </div>
        </div>
    </body>
</html>