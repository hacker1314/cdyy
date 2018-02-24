<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\tp\public/../application/admin\view\index\login.html";i:1519440975;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>场地预约后台登录</title>
            <link rel="stylesheet" href="/static/admin_login/style_log.css" type="text/css">
                <link rel="stylesheet" type="text/css" href="/static/admin_login/style.css">
                    <link rel="stylesheet" type="text/css" href="/static/admin_login/userpanel.css">
                        <link rel="stylesheet" type="text/css" href="/static/admin_login/jquery.ui.all.css">
                            </head>
                            <body class="login" mycollectionplug="bind">
                                <form name="input" action="<?php echo url('logincheck'); ?>" method="post">
                                    <div class="login_m" style="height: 500px;">
                                        <div class="login_logo"><img src="/static/admin_login/logo.png" width="240" height="50"></div>
                                        <div class="login_boder" style="height: 500px;">
                                            <div class="login_padding" id="login_model">
                                                <h2>用户名：</h2>
                                                <label>
                                                    <input type="text" name="username" id="username" class="txt_input txt_input2" value="">
                                                </label>
                                                <h2>密码：</h2>
                                                <label>
                                                    <input type="password" name="userpwd" id="userpwd" class="txt_input" value="">
                                                </label>
                                                <h2>验证码：</h2>
                                                <label>
                                                    <input type="text" name="code" id="code" class="txt_input" value="">
                                                </label>
                                                <div style="padding-bottom: 8px;padding-top: 8px;padding-left: 35px;"><?php echo captcha_img(); ?></div>
                                                <p class="forgot"><a id="iforget" href="javascript:void(0);">忘记密码?</a></p>
                                                <div class="rem_sub">
                                                    <div class="rem_sub_l">
                                                        <input type="checkbox" name="checkbox" id="save_me">
                                                            <label for="checkbox">记住我</label>
                                                    </div>
                                                    <label>
                                                        <input type="submit" class="sub_button" name="button" id="button" value="登录" style="opacity: 0.7;">
                                                    </label>
                                                </div>
                                            </div>
                                            </form>
                                            <!--login_padding  Sign up end-->
                                        </div><!--login_boder end-->
                                    </div><!--login_m end-->
                                    <br> <br>
                                            <p align="center"> 宁德师范学院 <a href="<?php echo url('index/index/index'); ?>" target="_blank" title="场地预约系统">场地预约系统</a> - Design By <a href="http://176.122.159.200/" title="cj" target="_blank">CJ</a></p>
                                            </body>
                                            </html>