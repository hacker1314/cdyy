<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\User;
use think\Session;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author 陈
 */
class Admin extends Controller {

    //主页
    public function index() {
        if (!Session::has('id'))
            $this->error('对不起，请登录后再试!', 'login');
        return $this->fetch();
    }

    //退出清除session
    public function exitadmin() {
        Session::clear();
        $this->success('您已安全退出!', 'login');
    }

    //登录界面
    public function login() {
        if (Session::has('name')) {
            $this->success('您已登录，请退出后再试!', 'index');
        } else
            return view();
    }

    //登录检查
    public function logincheck($username = "", $userpwd = "", $code="") {
        if (!Session::has('id')) {
            $captcha = new \think\captcha\Captcha();
            if (!$captcha->check($code)) {
                $this->error('验证码错误');
            } else {
                $user = User::getByName($username);
                if ($user) {
                    if ($user->usertype == 1) {
                        if ($user->password == $userpwd) {
                            Session::set('name', $username);
                            Session::set('id', $user->id);
                            $this->success('登录成功!', 'index');
                        } else {
                            $this->error('密码错误!', 'login');
                        }
                    } else {
                        echo '该用户不为网站后台管理员的身份!';
                    }
                } else
                    echo '用户名不存在!';
            }
        } else
            $this->success('您已登录!', 'index');
    }

}
