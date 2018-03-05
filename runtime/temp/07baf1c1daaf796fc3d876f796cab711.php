<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\xampp\htdocs\cdyy\public/../application/admin\view\buildings\index.html";i:1520219223;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\header.html";i:1519551428;s:61:"D:\xampp\htdocs\cdyy\application\admin\view\index\footer.html";i:1519441588;}*/ ?>
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
            <li class="layui-nav-item layui-nav-itemed">
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
    <span class="layui-breadcrumb">
        <a href="/admin">首页</a>
        <a href="">学生活动场地</a>
        <hr>
    </span>
    <div class="tableh">
        搜索学生活动场地：
        <div class="layui-inline">
            <input class="layui-input" name="name" id="nametext" autocomplete="off">
        </div>
        <button class="layui-btn" data-type="find"><i class="layui-icon">&#xe615;</i>搜索</button>
        <div class="layui-btn-group layui-layout-right"  style="margin-top: 60px;margin-right: 30px;">
            <button class="layui-btn" data-type="add"><i class="layui-icon">&#xe608;</i>增加场地</button>
        </div>
    </div>
    <table class="layui-hide" id="buildingmanage" lay-filter="buildingtable"></table>

</div>
<script src="/static/layui/layui.js"></script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="check">预约情况</a>
    <a class="layui-btn layui-btn-xs" lay-event="reset">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="picTpl">
    <a href="javascript:void(0);" onclick='showpic("{{d.pictureurl}}")' class="layui-table-link">查看照片</a>
</script>
<script type="text/html" id="statusTpl">
    {{#  if(d.status==1){ }}
    可预约
    {{#  } else { }}
    不可预约
    {{#  } }}
</script>
<script>
//JavaScript代码区域
    layui.use(['laytpl', 'layer', 'element', 'table'], function () {
    var laytpl = layui.laytpl;
    var table = layui.table;
    var $ = layui.$ //重点处
            , layer = layui.layer;
    table.render({
    elem: '#buildingmanage'
            , url: '/admin/buildings/buildinglist'
            , cols: [[
            {field: 'id', width: 70, minWidth: 80, title: 'ID', sort: true}
            , {field: 'name', minWidth: 120, title: '场地名'}
            , {field: 'introduction', minWidth: 300, title: '简介'}
            , {field: 'status', minWidth: 80, title: '可否预约', templet: '#statusTpl'}
            , {field: 'pictureurl', minWidth: 80, title: '照片', templet: '#picTpl'}
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
    , id: 'usertable',
    });
    //监听工具条    
    table.on('tool(usertable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
    var tr = obj.tr; //获得当前行 tr 的DOM对象

    if (layEvent === 'check') { //查看
    layer.open({
    type: 1,
            title: '审核',
            content: '' //这里content是一个普通的String
            , btn: ['通过', '不通过', '限制3周']
            , yes: function (index, layero) {
            //按钮【按钮一】的回调
            if (obj.data.status != '正常') {
            $.post("<?php echo url('admin/Usermanage/check'); ?>",
            {
            id: obj.data.id,
                    st: '正常',
            },
                    function (data, status) {
                    layer.msg("结果: \n" + data, {icon: 1});
                    });
            obj.update({
            status: '正常'
            });
            } else
                    layer.msg("该用户已为正常用户！", {icon: 1});
            layer.close(index);
            }
    , btn2: function (index, layero) {
    //按钮【按钮二】的回调
    if (obj.data.status == '需审核') {
    $.post("<?php echo url('admin/Usermanage/check'); ?>",
    {
    id: obj.data.id,
            st: '不通过',
    },
            function (data, status) {
            layer.msg("结果: \n" + data, {icon: 1});
            });
    obj.update({
    status: '不通过'
    });
    } else
            layer.msg("该用户审核过，无需审核！", {icon: 5});
    layer.close(index);
    //return false 开启该代码可禁止点击该按钮关闭
    }
    , btn3: function (index, layero) {
    //按钮【按钮三】的回调
    if (obj.data.status != '需审核') {
    if (obj.data.id == 1)
            layer.msg("系统默认管理员无法限制！", {icon: 5});
    else {
    if (obj.data.status != '限制3周') {
    $.post("<?php echo url('admin/Usermanage/check'); ?>",
    {
    id: obj.data.id,
            st: '限制3周',
    },
            function (data, status) {
            layer.msg("结果: \n" + data, {icon: 1});
            });
    obj.update({
    status: '限制3周'
    });
    } else
            layer.msg("该用户已经被限制3周！");
    }
    } else
            layer.msg("该用户为新注册用户，需审核后才能限制！", {icon: 5});
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
    layer.confirm('真的删除该用户嘛？', function (index) {
    if (obj.data.id != 1) {
    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
    $.post("<?php echo url('admin/Usermanage/del'); ?>",
    {
    id: obj.data.id,
    },
            function (data, status) {
            layer.msg("结果: \n" + data, {icon: 1});
            });
    //向服务端发送删除指令
    } else
            layer.msg("默认系统管理员用户禁止删除！", {icon: 2});
    layer.close(index);
    });
    } else if (layEvent === 'reset') { //重置
    //do something
    layer.confirm('确定重置密码嘛？', function (index) {
    if (obj.data.id != 1) {
    $.post("<?php echo url('admin/Usermanage/resetpwd'); ?>",
    {
    id: obj.data.id,
    },
            function (data, status) {
            layer.msg("结果: \n" + data, {icon: 1});
            });
    //向服务端发送重置指令
    } else
            layer.msg("默认系统管理员用户不支持重置密码！", {icon: 2});
    layer.close(index);
    });
    }
    });
    var $ = layui.$, active = {
    find: function () {
    var nametext = $('#nametext');
    //执行重载
    table.reload('usertable', {
    url: '/admin/buildings/buildingfind'
            , page: {
            curr: 1 //重新从第 1 页开始
            }
    , where: {

    name: nametext.val()
    }
    });
    }
    , add: function () {
    layer.open({
    type: 2
            , title: '添加学生活动场地'
            , content: "/admin/buildings/addb" //这里content是一个普通的String
            , area: ['520px', '450px']
    });
    }
    , checku: function () {
    table.reload('usertable', {
    url: '/admin/usermanage/unchecklist'
            , page: {
            curr: 1 //重新从第 1 页开始
            }
    , where: {

    check: '未审查'
    }
    });
    }
    };
    $('.tableh .layui-btn').on('click', function () {
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
    });
    });</script>
<script>
    function showpic(pic){
    layer.open({
    type: 1
            , title:'查看图片'
            , content: '<img src="' + pic + '" alt="' + pic + '" width="300" height="300">' //这里content是一个普通的String
            , anim:'2'
            , area: ['300px', '343px']
            , time: 5000
    });
    }
</script>
            <div class="layui-footer">
                <!-- 底部固定区域 -->
                © ndsy.cn - 宁德师范学院 - 场地预约管理系统
            </div>
        </div>
    </body>
</html>