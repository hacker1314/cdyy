<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\xampp\htdocs\cdyy\public/../application/admin\view\art\adda.html";i:1520393002;}*/ ?>
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
            <div id="editor">
                <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <textarea name="intro" id="texta" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
            <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
             <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript" src="/static/wangEditor/wangEditor.min.js"></script>
            <script type="text/javascript">
                var E = window.wangEditor
                var editor = new E('#editor')
                var $text1 = $('#texta')
                editor.customConfig.onchange = function (html) {
                    // 监控变化，同步更新到 textarea
                    $text1.val(html)
                }
                editor.create()
                // 初始化 textarea 的值
                $text1.val(editor.txt.html())
            </script>
            <div class="layui-form-item" style="margin-top: 15px;">
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
                            document.getElementById("pic").value = res.data.src; // 查找元素 
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