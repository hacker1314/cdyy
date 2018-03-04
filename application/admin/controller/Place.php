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
use app\index\model\Gym;
use app\index\model\Gymtype;
use app\index\model\Gymyy;

/**
 * Description of Place
 *
 * @author 陈
 */
class Place extends Controller {

    //put your code here
    public function index($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
            //左侧导航栏参数
            $this->assign('name', Session::get('name'));
            $list1 = Usertype::all();
            $list2 = Articletype::all();
            $this->assign('list1', $list1);
            $this->assign('list2', $list2);
            $this->assign('uid', $id);
            $list3=Gymtype::all();
            $this->assign('list3', $list3);
            $gym= Gymtype::get($id);
            $this->assign('cd',$gym->name);
            $this->assign('pid', $id);
        return $this->fetch();
    }

}
