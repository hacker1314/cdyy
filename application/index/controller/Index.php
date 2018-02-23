<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\User;
use think\Session;

class Index extends Controller {

    public function index() {
        return "主页！";
    }

    public function login() {
        return "hello";
    }

    public function LoginCheck($mail = '', $pwd = '') {
        $user = User::getByMail($mail);
        if ($user) {
            if ($user->password == $pwd) {
                Session::set('name',$user->name);
                Session::set('id', $user->id);
                $this->success('登录成功', 'index');
            } else {
                echo '密码错误';
            }
        } else
            echo '邮箱未注册';
    }

    public function t() {
        return view();
    }

}
