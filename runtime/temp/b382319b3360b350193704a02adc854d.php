<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\xampp\htdocs\cdyy\public/../application/admin\view\index\index.html";i:1519895880;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\header.html";i:1519551428;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\footer.html";i:1519441588;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>宁德师范学院-场地预约系统-后台管理系统</title>
        <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    </head>
    <body class="layui-layout-body">
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
                <div class="layui-logo">宁师场地预约系统</div>
<!-- 头部区域（可配合layui已有的水平导航） -->
<ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item"><a href="<?php echo url('index/index/index'); ?>">网站首页</a></li>
    <li class="layui-nav-item"><a href="<?php echo url('admin/index/index'); ?>">网站信息</a></li>
    <li class="layui-nav-item"><a href="">统计</a></li>
    <!-- <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
            <dd><a href="">邮件管理</a></dd>
            <dd><a href="">消息管理</a></dd>
            <dd><a href="">授权管理</a></dd>
        </dl>
    </li> -->
</ul>
<ul class="layui-nav layui-layout-right">
    <li class="layui-nav-item">
        <a href="javascript:;">
            <?php echo $name; ?>
        </a>
        <dl class="layui-nav-child">
            <dd><a href="<?php echo url('admin/Userinfo/index'); ?>">安全设置</a></dd>
        </dl>
    </li>
    <li class="layui-nav-item"><a href="<?php echo url('exitadmin'); ?>">退出</a></li>
</ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item  layui-nav-itemed">
                <a class="" href="javascript:;"><i class='layui-icon'>&#xe642;</i>场地管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('admin/place/index'); ?>?id=1">体育活动场地</a></dd>
                    <dd><a href="<?php echo url('admin/place/index'); ?>?id=2">学生活动场地</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;"><i class='layui-icon'>&#xe612;</i>用户管理</a>
                <dl class="layui-nav-child">
                    <?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                    <dd><a href="<?php echo url('admin/Usermanage/index'); ?>?id=<?php echo $id['id']; ?>"><?php echo $id['name']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;"><i class='layui-icon'>&#xe7a0;</i>文章管理</a>
                <dl class="layui-nav-child">
                    <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                    <dd><a href="javascript:;"><?php echo $id['name']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </li>
            <li class="layui-nav-item"><a href=""><i class='layui-icon'>&#xe658;</i>预约信息管理</a></li>
        </ul>
    </div>
</div>

<div class="layui-body" style="padding-left: 20px;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;">
    <!-- 内容主体区域 -->
    <div class="layui-fluid">
        <div class="layui-row layui-col-space20">
            <div class="layui-col-md6">
                <div class="layui-collapse">
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title"><i class="layui-icon">&#xe614;</i>系统概要</h2>
                        <div class="layui-colla-content layui-show">
                            版本信息：cdyy1.0
                            <hr>
                            开发作者：dean_cj
                            <hr>
                            网站目录：<?php echo APP_PATH; ?>
                            <hr>
                            服务器IP：<?php echo $_SERVER['SERVER_ADDR']; ?>
                            <hr>
                            服务器域名：<?php echo $_SERVER['SERVER_NAME']; ?>
                            <hr>
                            服务器系统：<?php echo $hostos; ?>
                            <hr>
                            服务器环境：<?php echo $_SERVER ['SERVER_SOFTWARE']; ?>
                            <hr>
                            数据库版本：<?php echo $hostsql; ?>
                            <hr>
                            最大上传限制：<?php echo $hostupload; ?>
                            <hr>
                            当前登录用户：<?php echo $name; ?>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-collapse">
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title"><i class="layui-icon">&#xe658;</i>网站流量</h2>
                        <div class="layui-colla-content layui-show">
                            ip
                            <hr>
                            pv
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space20">
            <div class="layui-col-md6">
                <div class="layui-collapse">
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title"><i class="layui-icon">&#xe612;</i>用户概要</h2>
                        <div class="layui-colla-content layui-show">
                            <?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                            <?php echo $id['name']; ?>：<?php echo $id['count']; ?>
                            <hr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-collapse">
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title"><i class="layui-icon">&#xe622;</i>文章概要</h2>
                        <div class="layui-colla-content layui-show">
                            <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                            <?php echo $id['name']; ?>：<?php echo $id['count']; ?>
                            <hr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- <div class="layui-collapse">
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">杜甫</h2>
            <div class="layui-colla-content layui-show">内容区域</div>
        </div>
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">李清照</h2>
            <div class="layui-colla-content layui-show">内容区域</div>
        </div>
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">鲁迅</h2>
            <div class="layui-colla-content layui-show">内容区域</div>
        </div>
    </div>-->
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