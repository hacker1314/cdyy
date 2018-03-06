<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp64\www\cdyy\public/../application/admin\view\art\adda.html";i:1520347559;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>[title]</title>
        <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
    </head>
    <body>
        <form class="layui-form layui-form-pane" action="<?php echo url('admin/place/addpl'); ?>" style="margin-left: 20px;margin-right: 20px;margin-top: 20px;">
            <div class="layui-form-item">
                <label class="layui-form-label">标题：</label>
                <div class="layui-input-block">
                    <input type="text" name="placename" required  lay-verify="required" placeholder="请输入场地名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-hide">
                <label class="layui-form-label">文章类型类型：</label>
                <div class="layui-input-block">
                    <input type="text" name="aid" required  lay-verify="required" placeholder="请输入场地名" autocomplete="off" class="layui-input" value="<?php echo $aid; ?>">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <textarea name="intro" placeholder="请输入内容" class="layui-textarea"></textarea>
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
            layui.use(['form', 'upload'], function () {
                var form = layui.form;
                //监听提交
                form.on('submit(sub)', function (data) {
                    layer.msg('提交成功');
                    return true;
                });
                //图片上传
                var upload = layui.upload;
                //执行实例
                var uploadInst = upload.render({
                    elem: '#update' //绑定元素
                    , url: '/uploads/' //上传接口
                    , done: function (res) {
                        //上传完毕回调
                        layer.msg(res.data.src);
                        console.log(res.data.src);
                        document.getElementById("pic").value=res.data.src; // 查找元素 
                    }
                    , error: function () {
                        //请求异常回调

                    }
                    , accept: 'image'
                });
            });
        </script>
    </body>
</html>