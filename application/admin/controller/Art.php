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
use app\index\model\Studentuser;
use app\index\model\article;

/**
 * Description of art
 *
 * @author C
 */
class Art extends Controller {

    //put your code here
    //文章管理首页
    public function index($id = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $this->assign('name', Session::get('name'));
        $list1 = Usertype::all();
        $list2 = Articletype::all();
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $typename = Usertype::getById($id);
        $this->assign('typename', $typename->name);
        $this->assign('uid', $id);
        $list3 = Gymtype::all();
        $this->assign('list3', $list3);
        $this->assign('aid', $id);
        return $this->fetch();
    }

    //文章列表API
    public function artlist($id = 1, $page = 1, $limit = 10) {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $place = article::where('articletype', '=', $id)->field(['id', 'title', 'username', 'content', 'time', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $pcount = count(Gym::where('type', '=', $id)->select());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $pcount, $place);
        dump($rs1);
    }

    //
}
