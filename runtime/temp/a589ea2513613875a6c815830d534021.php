<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\cdyy\public/../application/index\view\index\reg.html";i:1521274722;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0027)http://sso.softseeks.cn/Reg -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>宁德师范学院-场地预约系统-注册</title>
    <meta name="description" content="软云小程序:中国最大的软件在线电子商务网站服务商。软云小程序">
    <meta name="keywords" content="会员注册">
    <link href="/static/index/bootstrap.min.css" rel="stylesheet">
    <link href="/static/index/gloab.css" rel="stylesheet">
    <link href="/static/index/index.css" rel="stylesheet">
    <script src="/static/index/jquery-1.11.1.min.js"></script>
    <script src="/static/index/register.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/index/gwdang-notifier.js"></script><script src="/static/index/z_stat.php" async="" defer=""></script><style type="text/css">#maxthon-1eec22d4-0232-4212-8283-6f2ac8f967-iframe{display:block!important;position:absolute!important;visibility:visible!important;z-index:2147483647!important;border-style:none!important;opacity:1!important;margin:0!important;padding:0!important;box-shadow:0 0 5px rgba(0,0,0,.3)!important;border:1px solid #b3b3b3!important}</style></head>
<body class="bgf4">
    <div class="head_bg">
        <div class="header">
            <div class="logo clearfix">
                <div class="logocon">
                    <a href="http://ruanyun.softseeks.cn/">
                            <img alt="软云小程序" title="软云小程序" src="/static/index/201712211733591937.png">
                        </a>
                </div>
                <p class="head_tip">
                    欢迎注册
                </p>


            </div>
        </div>
    </div>

    <div class="login-box f-mt10 f-pb50">
        <div class="allWrap">
            <div class="main_top clearfix">
                <div class="main_top_l">
                    <span class="decoration"></span>
                </div>
                <div class="main_top_r">
                    已有账号了？
					<a rel="nofollow" target="_self" href="http://sso.softseeks.cn/Login">登录
                    </a>
                </div>
            </div>
        </div>

        <div class="main bgf">

            <div class="reg-box-pan display-inline">
                <div class="step">
                    <ul>
                        <li class="col-xs-4 on">
                            <span class="num"><em class="f-r5"></em><i>1</i></span>
                            <span class="line_bg lbg-r"></span>
                            <p class="lbg-txt">填写账户信息</p>
                        </li>
                        <li class="col-xs-4">
                            <span class="num"><em class="f-r5"></em><i>2</i></span>
                            <span class="line_bg lbg-l"></span>
                            <span class="line_bg lbg-r"></span>
                            <p class="lbg-txt">验证账户信息</p>
                        </li>
                        <li class="col-xs-4">
                            <span class="num"><em class="f-r5"></em><i>3</i></span>
                            <span class="line_bg lbg-l"></span>
                            <p class="lbg-txt">注册成功</p>
                        </li>
                    </ul>
                </div>
                <div class="reg-box" id="verifyCheck" style="margin-top: 20px;">
                    <div class="part1">
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>用户名：</span>
                            <div class="f-fl item-ifo">
                                <input type="text" maxlength="20" class="txt03 f-r3 required" onblur="VerifyUserName()" tabindex="1" data-valid="isNonEmpty||between:3-20||isUname" data-error="用户名不能为空||用户名长度3-20位||只能输入中文、字母、数字、下划线，且以中文或字母开头" id="adminNo">
                                <span class="ie8 icon-close close hide"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus"><span>3-20位，中文、字母、数字、下划线的组合，以中文或字母开头</span></label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>手机号：</span>
                            <div class="f-fl item-ifo">
                                <input type="text" class="txt03 f-r3 required" keycodes="tel" onblur="VerifyMobilePhone()" tabindex="2" data-valid="isNonEmpty||isPhone" data-error="手机号码不能为空||手机号码格式不正确" maxlength="11" id="phone">
                                <span class="ie8 icon-close close hide"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">请填写11位有效的手机号码</label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>密码：</span>
                            <div class="f-fl item-ifo">
                                <input type="password" id="password" maxlength="20" class="txt03 f-r3 required" tabindex="3" style="ime-mode: disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-20||level:2" data-error="密码不能为空||密码长度6-20位||该密码太简单，有被盗风险，建议字母+数字的组合">
                                <span class="ie8 icon-close close hide" style="right: 55px"></span>
                                <span class="showpwd" data-eye="password"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
                                <label class="focus valid"></label>
                                <span class="clearfix"></span>
                                <label class="strength">
                                    <span class="f-fl f-size12">安全程度：</span>
                                    <b><i>弱</i><i>中</i><i>强</i></b>
                                </label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>
                            <div class="f-fl item-ifo">
                                <input type="password" maxlength="20" class="txt03 f-r3 required" tabindex="4" style="ime-mode: disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-16||isRepeat:password" data-error="密码不能为空||密码长度6-16位||两次密码输入不一致" id="rePassword">
                                <span class="ie8 icon-close close hide" style="right: 55px"></span>
                                <span class="showpwd" data-eye="rePassword"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">请再输入一遍上面的密码</label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>验证码：</span>
                            <div class="f-fl item-ifo">
                                <input type="text" maxlength="6" class="txt03 f-r3 f-fl required" tabindex="6" style="width: 167px" id="randCode" data-valid="isNonEmpty" data-error="验证码不能为空">
                                <span class="ie8 icon-close close hide"></span>
                                <label class="f-size12 c-999 f-fl f-pl10">
                                    <img id="ValidateCode" src="/static/index/GetValidateCode" class="verificationcode" style="height:30px; cursor:pointer;">
                                </label>
                                <label class="icon-sucessfill blank hide" style="left: 380px"></label>
                                <label class="focusa">看不清？<a href="javascript:;" class="c-blue verificationcode">换一张</a></label>
                                <label class="focus valid" style="left: 370px"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12" style="height: auto">
                            <span class="intelligent-label f-fl">&nbsp;</span>
                            <p class="f-size14 required" data-valid="isChecked" data-error="请先同意条款">
                                <input type="checkbox" checked=""><a href="javascript:showoutc();" class="f-ml5">我已阅读并同意条款</a>
                            </p>
                            <label class="focus valid"></label>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl">&nbsp;</span>
                            <div class="f-fl item-ifo">
                                <button class="btn btn-blue f-r3" id="btn_part1" disabled="disabled">下一步</button>
                                
                            </div>
                        </div>
                    </div>
                    <div class="part2" style="display: none">
                        <div class="alert alert-info" style="width: 700px">短信已发送至您手机，请输入短信中的验证码，确保您的手机号真实有效。</div>
                        <div class="item col-xs-12 f-mb10" style="height: auto">
                            <span class="intelligent-label f-fl">手机号：</span>
                            <div class="f-fl item-ifo c-blue" id="MoPhone">
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>验证码：</span>
                            <div class="f-fl item-ifo">
                                <input type="text" maxlength="6" id="verifyNo" class="txt03 f-r3 f-fl required" tabindex="4" style="width: 167px" data-valid="isNonEmpty||isInt" data-error="验证码不能为空||请输入6位数字验证码">
                                <span class="btn btn-gray f-r3 f-ml5 f-size13" id="time_box" disabled="" style="width: 97px; display: none;">发送验证码</span>
                                <span class="btn btn-gray f-r3 f-ml5 f-size13" id="verifyYz" style="width: 97px;">发送验证码</span>
                                <span class="ie8 icon-close close hide" style="right: 130px"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus"><span>请查收手机短信，并填写短信中的验证码（此验证码3分钟内有效）</span></label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl">&nbsp;</span>
                            <div class="f-fl item-ifo">
                                <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part2">注册</a>
                            </div>
                        </div>
                    </div>

                    <div class="part4 text-center" style="display: none">
                        <h3>恭喜<span id="Amlojt"></span>，您已注册成功，现在开始您的小程序之旅吧！</h3>
                        <p class="c-666 f-mt30 f-mb50">页面将在 <strong id="times" class="f-size18">10</strong> 秒钟后，跳转到 <a href="http://sso.softseeks.cn/Home/Index" class="c-blue">用户中心</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-sPopBg" style="z-index: 998;"></div>
    <div class="m-sPopCon regcon">
        <div class="m-sPopTitle"><strong>服务协议条款</strong><b id="sPopClose" class="m-sPopClose" onclick="closeClause()">×</b></div>
        <div class="apply_up_content">
            <pre class="f-r0">		<strong>同意以下服务条款，提交注册信息</strong>
        </pre>
        </div>
        <center><a class="btn btn-blue btn-lg f-size12 b-b0 b-l0 b-t0 b-r0 f-pl50 f-pr50 f-r3" href="javascript:closeClause();">已阅读并同意此条款</a></center>
    </div>
    <script>
        $(function () {
            $(".verificationcode").bind("click", function () {
                $("#ValidateCode").attr("src", "../Temple/GetValidateCode?time=" + (new Date()).getTime());//this.src = "../Temple/GetValidateCode?time=" + (new Date()).getTime();
            });

            //第一页的确定按钮
            $("#btn_part1").click(function () {
                if (!verifyCheck._click()) return;
                $("#MoPhone").html($("#phone").val().substring(0, 3) + "****" + $("#phone").val().substring(7, 11));
                $("#Amlojt").html($("#adminNo").val())

                $.ajax({
                    type: "post",
                    url: '/Login/VerifyCode',
                    data: { Code: $("#randCode").val() },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data.code == 400) {
                            $("#randCode").parent(".item-ifo").children(".valid").addClass("error");
                            $("#randCode").parent(".item-ifo").children(".valid").removeClass("hide");
                            $("#randCode").parent(".item-ifo").children(".blank").addClass("hide");
                            $("#randCode").parent(".item-ifo").children(".valid").html(data.description)
                            $("#randCode").addClass("v_error");
                        } else {
                            $(".part1").hide();
                            $(".part2").show();
                            $(".step li").eq(1).addClass("on");
                            $("#randCode").removeClass("v_error");
                            $("#randCode").parent(".item-ifo").children(".valid").addClass("hide");
                            $("#randCode").parent(".item-ifo").children(".valid").removeClass("error");
                            $("#randCode").parent(".item-ifo").children(".blank").removeClass("hide");
                        }
                    }
                });



            });
            //第二页的确定按钮
            $("#btn_part2").click(function () {
                if (!verifyCheck._click()) return;

                $.ajax({
                    type: "post",
                    url: '/Reg/SumbitReg',
                    data: { Account: $("#adminNo").val(), Mobilephone: $("#phone").val(), Password: $("#password").val(), SmsCode: $("#verifyNo").val() },
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 400) {
                            alert(data.description)
                        } else {
                            $(".part2").hide();
                            $(".part4").show();
                            $(".step li").eq(2).addClass("on");
                            countdown({
                                maxTime: 10,
                                ing: function (c) {
                                    $("#times").text(c);
                                },
                                after: function () {
                                    window.location.href = "/Home/Index";
                                }
                            });
                        }
                    }
                });
            });

        });
        function showoutc() { $(".m-sPopBg,.m-sPopCon").show(); }
        function closeClause() {
            $(".m-sPopBg,.m-sPopCon").hide();
        }

        function VerifyUserName() {
            var adminNo = $("#adminNo").val();

            if (adminNo != "") {
                $.ajax({
                    type: "post",
                    url: '/Login/VerifyUserName',
                    data: { Account: adminNo },
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 400) {
                            $("#btn_part1").attr("disabled", true)
                            $("#adminNo").parent(".item-ifo").children(".valid").addClass("error");
                            $("#adminNo").parent(".item-ifo").children(".valid").removeClass("hide");
                            $("#adminNo").parent(".item-ifo").children(".blank").addClass("hide");
                            $("#adminNo").parent(".item-ifo").children(".valid").html(data.description)
                            $("#adminNo").addClass("v_error");
                        } else {
                            $("#btn_part1").removeAttr("disabled")
                            $("#adminNo").removeClass("v_error");
                            $("#adminNo").parent(".item-ifo").children(".valid").addClass("hide");
                            $("#adminNo").parent(".item-ifo").children(".valid").removeClass("error");
                            $("#adminNo").parent(".item-ifo").children(".blank").removeClass("hide");
                        }
                    }
                });
            }

            //alert('s')
        }

        function VerifyMobilePhone() {
            var MobilePhone = $("#phone").val();

            if (MobilePhone != "") {
                $.ajax({
                    type: "post",
                    url: '/Login/VerifyMobilePhone',
                    data: { MobilePhone: MobilePhone },
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 400) {
                            $("#btn_part1").attr("disabled", true)
                            $("#phone").parent(".item-ifo").children(".valid").addClass("error");
                            $("#phone").parent(".item-ifo").children(".valid").removeClass("hide");
                            $("#phone").parent(".item-ifo").children(".blank").addClass("hide");
                            $("#phone").parent(".item-ifo").children(".valid").html(data.description)
                            $("#phone").addClass("v_error");
                        } else {
                            $("#btn_part1").removeAttr("disabled")
                            $("#phone").removeClass("v_error");
                            $("#phone").parent(".item-ifo").children(".valid").addClass("hide");
                            $("#phone").parent(".item-ifo").children(".valid").removeClass("error");
                            $("#phone").parent(".item-ifo").children(".blank").removeClass("hide");
                        }
                    }
                });
            }
        }

    </script>
    <div style="text-align: center;">
        <p style="color: #ffffff;"><em>© 2017 ruanyun.softseeks.com 版权所有</em></p>
    </div>


</body></html>