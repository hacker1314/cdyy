<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\xampp\htdocs\cdyy\public/../application/admin\view\usermanage\addu.html";i:1519887232;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>[title]</title>
        <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    </head>
    <body>
        <form class="layui-form layui-form-pane" action="<?php echo url('admin/usermanage/adduser'); ?>?id=<?php echo $id; ?>" style="margin-left: 20px;margin-right: 20px;margin-top: 20px;">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名：</label>
                <div class="layui-input-block">
                    <input type="text" name="username" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码框：</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" required lay-verify="required" placeholder="初始密码为12345678" autocomplete="off" class="layui-input" value="12345678">
                </div>
                <div class="layui-form-mid layui-word-aux">默认为：12345678</div>
            </div>  
            <div class="layui-form-item">
                <label class="layui-form-label">手机号码：</label>
                <div class="layui-input-block">
                    <input type="text" name="phonenumber" required  lay-verify="required|phone" placeholder="请输入手机" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱地址：</label>
                <div class="layui-input-block">
                    <input type="text" name="mail" required  lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">用户状态：</label>
                <div class="layui-input-inline">
                    <input type="text" name="status" required lay-verify="required" placeholder="正常" autocomplete="off" class="layui-input" value="正常">
                </div>
                <div class="layui-form-mid layui-word-aux">管理员添加默认通过</div>
            </div>
            <div class="layui-form-item layui-hide">
                <label class="layui-form-label">用户类型：</label>
                <div class="layui-input-inline">
                    <input type="text" name="id" required lay-verify="required" placeholder="<?php echo $id; ?>" autocomplete="off" class="layui-input" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="sub">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
        <script src="/static/layui/layui.js"></script>
        <script>
            layui.use('form', function () {
                var form = layui.form;

                //监听提交
                form.on('submit(sub)', function (data) {
                    layer.msg('提交成功');
                    return true;
                });
            });
        </script>
    </body>
</html>