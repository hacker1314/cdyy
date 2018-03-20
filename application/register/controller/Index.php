<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\register\controller;

use think\Controller;
use think\Db;
use app\index\model\User;
use think\Session;
use app\index\model\Mailcode;
use app\index\model\Studentuser;

/**
 * Description of index
 *
 * @author CJ520
 */
class Index extends Controller {

    //put your code here
    //注册资料填写页面
    public function index() {
        return $this->fetch();
    }

    //注册邮箱验证
    public function check($name = "", $email = "", $phone = "", $password1 = "", $password2 = "", $code = "", $xh = "", $xy = "", $zy = "", $st = "") {
//        $captcha = new \think\captcha\Captcha();
//        if (!$captcha->check($code)) {
//            return $this->error('验证码错误！');
//        }
        if ($password1 != $password2)
            return $this->error("两次密码输入不一致！");
        $user = User::getByName($name);
        if ($user)
            return $this->error("用户名已经存在，请重试！");
        $ma = User::getByMail($email);
        if ($ma)
            return $this->error("邮箱已经存在，请重试！");
        $xh1= Studentuser::getByXuehao($xh);
        if(!$xh1)
            return $this->error ("该学号已经注册过账号！");
        $user1 = new User;
        $user1->name = $name;
        $user1->mail = $email;
        $user1->phonenumber = $phone;
        $user1->password = md5($password1);
        $user1->usertype = 7;
        $user1->registertime = date("Y-m-d H:i:s", time());
        $user1->status = "邮箱未验证";
        $user1->save();
        return $this->redirect("/register/index/checkshow", ['mail' => $email]);
    }

    //邮箱验证
    public function checkshow($mail = "") {
        $this->assign('email', $mail);
        return $this->fetch();
    }

    //邮箱验证码发送
    public function resend($mail = "") {
        if ($mail == "")
            return $this->error("邮箱为空");
        $user = User::getByMail($mail);
        if ($user) {
            if ($user->status == "邮箱未验证") {
                $mc = Mailcode::getByMail($mail);
                if (!$mc) {
                    $code = rand('100000', '999999');
                    $mailc = new Mailcode();
                    $mailc->mail = $mail;
                    $mailc->code = $code;
                    $mailc->save();
                    $name = 'ndsy';
                    $subject = '宁德师范学院-场地预约管理系统-验证码';
                    $content = '恭喜您已经提交注册，现在请按照注册界面输入验证码。此次验证码为：' . $code;
                    send_mail($mail, $name, $subject, $content);
                } else {
                    $code = rand('100000', '999999');
                    $mc->code = $code;
                    $mc->save();
                    $name = 'ndsy';
                    $subject = '宁德师范学院-场地预约管理系统-验证码';
                    $content = '恭喜您已经提交注册，现在请按照注册界面输入验证码。此次验证码为：' . $code;
                    send_mail($mail, $name, $subject, $content);
                }
            } else
                return $this->error("该邮箱已经通过验证！");
        } else
            return $this->error("该邮箱不存在！");
    }

    //邮箱验证码校验
    public function codecheck($mail = "", $code = "") {
        if ($mail == "")
            return $this->error("邮箱为空！");
        if ($code == "")
            return $this->error("请填写验证码！");
        $mc = Mailcode::getByMail($mail);
        if ($mc) {
            $user = User::getByMail($mail);
            if ($user->status == "邮箱未验证") {
                if ($mc->code == $code) {
                    $user = User::getByMail($mail);
                    $user->status = "需审核";
                    $user->save();
                    return $this->success("验证成功！");
                } else
                    return $this->error("验证码错误请重试！");
            } else
                return $this->success("该邮箱已经验证过！");
        }
    }

    //注册成功！
    public function finalreg() {
        return $this->fetch();
    }

}
