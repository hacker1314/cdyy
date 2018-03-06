<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use app\index\model\User;
use app\index\model\Usertype;
use app\index\model\Articletype;
use think\Session;
use app\index\model\Blackhome;
use app\index\model\Building;
use app\index\model\Gym;
use app\index\model\Gymtype;
use app\index\model\Gymyy;

/**
 * Description of Admin
 *
 * @author 陈
 */
class index extends Controller {

    public function ww() {
        for ($i = 0; $i < Usertype::max('id'); $i++) {
            $count1[$i] = User::where('usertype', $i + 1)->count();
        }
        print_r($count1);
    }

    //主页网站信息
    public function index() {
        if (!Session::has('id'))
            return $this->redirect('login');
        $list1 = Usertype::all();
        $list2 = Articletype::all();
        $sqlver = Db::query('select VERSION()');
        $count1 = array();
        for ($i = 0; $i < Usertype::max('id'); $i++) {
            $count1[$i] = User::where('usertype', $i + 1)->count();
        }
        $count1 = User::where('usertype', 1)->count();
        $this->assign([
            'name' => Session::get('name'),
            'list1' => $list1,
            'list2' => $list2,
            'hostos' => PHP_OS,
            'hostupload' => get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许上传附件",
            'hostsql' => $sqlver[0]['VERSION()'],
            'count1' => $count1,
        ]);
        $list3 = Gymtype::all();
        $this->assign('list3', $list3);
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
    public function logincheck($username = "", $userpwd = "", $code = "") {
        if (!Session::has('id')) {
            $captcha = new \think\captcha\Captcha();
            if (!$captcha->check($code)) {
                $this->error('验证码错误');
            } else {
                $user = User::getByName($username);
                if ($user) {
                    if ($user->usertype == 1) {
                        if ($user->password == md5($userpwd)) {
                            Session::set('name', $username);
                            Session::set('id', $user->id);
                            $user->lastlogintime = date("Y-m-d H:i:s", time());
                            $user->save();
                            return $this->redirect('index');
                            //$this->success('登录成功!', 'index');
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
