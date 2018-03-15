<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\xampp\htdocs\cdyy\public/../application/admin\view\art\index.html";i:1521085144;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\header.html";i:1519551428;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\footer.html";i:1519441588;}*/ ?>
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
    <li class="layui-nav-item"><a href="<?php echo url('admin/index/exitadmin'); ?>">退出</a></li>
</ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item">
                <a class="" href="javascript:;"><i class='layui-icon'>&#xe715;</i>体育活动场地</a>
                <dl class="layui-nav-child">
                    <?php if(is_array($list3) || $list3 instanceof \think\Collection || $list3 instanceof \think\Paginator): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?>
                    <dd><a href="<?php echo url('admin/place/index'); ?>?id=<?php echo $id['id']; ?>"><?php echo $id['name']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="" href="<?php echo url('admin/buildings/index'); ?>"><i class='layui-icon'>&#xe715;</i>学生活动场地</a>
            </li>
            <li class="layui-nav-item">
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
                    <dd><a href="<?php echo url('admin/art/index'); ?>?id=<?php echo $id['id']; ?>"><?php echo $id['name']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class='layui-icon'>&#xe658;</i>预约信息管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('admin/yuyue/place'); ?>">体育活动场地预约管理</a></dd>
                    <dd><a href="<?php echo url('admin/yuyue/building'); ?>">体育活动场地预约管理</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

<div class="layui-body" style="padding-left: 20px;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;">
    <!-- 内容主体区域 -->
    <span class="layui-breadcrumb">
        <a href="/">首页</a>
        <a href="">文章管理</a>
        <a><cite><?php echo $artt; ?></cite></a>
        <hr>
    </span>
    <div class="tableh">
        搜索文章标题：
        <div class="layui-inline">
            <input class="layui-input" name="name" id="nametext" autocomplete="off">
        </div>
        <button class="layui-btn" data-type="find"><i class="layui-icon">&#xe615;</i>搜索</button>
        <div class="layui-btn-group layui-layout-right"  style="margin-top: 60px;margin-right: 30px;">
            <button class="layui-btn" data-type="add"><i class="layui-icon">&#xe608;</i>增加</button>
            <button class="layui-btn" data-type="checku"><i class="layui-icon">&#xe6b2;</i>审核文章</button>
        </div>
    </div>
    <table class="layui-hide" id="artmanage" lay-filter="arttable"></table>
</div>
<script src="/static/layui/layui.js"></script>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">详细</a>
    <a class="layui-btn layui-btn-xs" lay-event="check">审核</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    {{#  if(d.status==0){ }}
    未审核
    {{#  } else if (d.status==1){ }}
    审核通过
    {{#  } else{ }}
    不通过
    {{#  } }}
</script>
<script>
//JavaScript代码区域
layui.use(['layer', 'element', 'table'], function () {
    var table = layui.table;
    var $ = layui.$ //重点处
            , layer = layui.layer;
    table.render({
        elem: '#artmanage'
        , url: '/admin/art/artlist'
        , where: {id: <?php echo $aid; ?>}
        , cols: [[
                {field: 'id', width: 80, minWidth: 80, title: 'ID', sort: true}
                , {field: 'title', minWidth: 120, title: '标题'}
                , {field: 'gaiyao', minWidth: 170, title: '内容概要'}
                , {field: 'time', minWidth: 170, title: '编辑时间'}
                , {field: 'username', minWidth: 170, title: '作者'}
                , {field: 'status', minWidth: 130, title: '文章状态', templet: '#statusTpl'}
                , {fixed: 'right', minWidth: 200, align: 'center', toolbar: '#barDemo'} //这里的toolbar值是模板元素的选择器
            ]]
        , height: 'full-260'
        , page: true
        , done: function (res, page, count) {
            //如果是异步请求数据方式，res即为你接口返回的信息。
            //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
            console.log(res);

            //得到当前页码
            console.log(page);

            //得到数据总量
            console.log(count);
        }
        , text: {
            none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
        }
        , id: 'arttable',
    });
    //监听工具条    
    table.on('tool(arttable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        var tr = obj.tr; //获得当前行 tr 的DOM对象

        if (layEvent === 'check') { //审核
            layer.open({
                type: 1,
                title: '审核',
                content: '' //这里content是一个普通的String
                , btn: ['通过', '不通过']
                , yes: function (index, layero) {
                    //按钮【按钮一】的回调
                    if (obj.data.status != 0) {
                        $.post("<?php echo url('admin/art/check'); ?>",
                                {
                                    id: obj.data.id,
                                    st: 1,
                                },
                                function (data, status) {
                                    layer.msg("结果: \n" + data, {icon: 1});
                                });
                        obj.update({
                            status: 1
                        });
                    } else
                        layer.msg("该用户已为正常用户！", {icon: 1});
                    layer.close(index);

                }
                , btn2: function (index, layero) {
                    //按钮【按钮二】的回调
                    $.post("<?php echo url('admin/art/check'); ?>",
                            {
                                id: obj.data.id,
                                st: 2,
                            },
                            function (data, status) {
                                layer.msg("结果: \n" + data, {icon: 1});
                            });
                    obj.update({
                        status: 2
                    });
                    layer.close(index);
                    //return false 开启该代码可禁止点击该按钮关闭
                }
                , cancel: function () {
                    //右上角关闭回调

                    //return false 开启该代码可禁止点击该按钮关闭
                }
            });
            //do somehing
        } else if (layEvent === 'del') { //删除
            layer.confirm('真的删除该文章？', function (index) {
                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                $.post("<?php echo url('admin/art/del'); ?>",
                        {
                            id: obj.data.id,
                        },
                        function (data, status) {
                            layer.msg("结果: \n" + data, {icon: 1});
                        });
                //向服务端发送删除指令
                layer.close(index);

            });
        } else if (layEvent === 'detail') { //重置
            layer.open({
                type: 2
                , title: '编辑<?php echo $artt; ?>'
                , content: "/admin/art/detail?id=" + obj.data.id //这里content是一个普通的String
                , area: ['720px', '580px']
            });
        } else if (layEvent === 'edit') {
            layer.open({
                type: 2
                , title: '编辑<?php echo $artt; ?>'
                , content: "/admin/art/edit?id=" + obj.data.id //这里content是一个普通的String
                , area: ['720px', '580px']
            });
        }
    });
    var $ = layui.$, active = {
        find: function () {
            var nametext = $('#nametext');
            //执行重载
            table.reload('arttable', {
                url: '/admin/art/find'
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
                , where: {
                    id: <?php echo $aid; ?>,
                    name: nametext.val()
                }
            });
        }
        , add: function () {
            layer.open({
                type: 2
                , title: '添加<?php echo $artt; ?>'
                , content: "/admin/art/adda?id=<?php echo $aid; ?>" //这里content是一个普通的String
                , area: ['720px', '580px']
            });
        }
        , checku: function () {
            table.reload('arttable', {
                url: '/admin/art/uncheck'
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
                , where: {
                    id: <?php echo $aid; ?>,
                    status: 0
                }
            });
        }
    };
    $('.tableh .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });
});
</script>
            <div class="layui-footer">
                <!-- 底部固定区域 -->
                © ndsy.cn - 宁德师范学院 - 场地预约管理系统
            </div>
        </div>
    </body>
</html>