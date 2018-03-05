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
 * Description of Building
 *
 * @author 陈
 */
class Buildings extends Controller {

    //put your code here
    public function index($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
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
        $list3 = Gymtype::all();
        $this->assign('list3', $list3);

        return $this->fetch();
    }

    //场地列表API
    public function buildinglist($id = 1, $page = 1, $limit = 10) {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $building = Building::field(['id', 'name', 'introduction', 'pictureurl', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $bcount = count(Building::all());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $bcount, $building);
        dump($rs1);
    }

    //场地列表搜索
    public function buildingfind($id = 1, $page = 1, $limit = 10, $name = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($name == '')
            return $this->redirect('buildings/buildinglist');
        $building = Building::where('name', 'like', '%' . $name . '%')->field(['id', 'name', 'introduction', 'pictureurl', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $bcount = count(Building::where('name', 'like', '%' . $name . '%')->select());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $bcount, $building);
        dump($rs1);
    }

    //添加场地
    public function addb() {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        return $this->fetch();
    }

    //添加场地处理
    public function addbu($buildingname = "", $yuyue = '', $intro = '', $pic = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($buildingname == "")
            return $this->error('用户名为空！');
        if ($yuyue == "")
            return $this->error('请选定该场地是否可预约！');
        if ($pic == '')
            return $this->error('图片地址为空！');
        $add = new Building;
        $add->name = $buildingname;
        $add->introduction = $intro;
        $add->status = $yuyue;
        $add->pictureurl = $pic;
        $add->save();
        return $this->success('场地添加成功，请刷新页面查看！');
    }

    //编辑场地
    public function editb($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $b = Buildings::get($id);
        $this->assign([
            'buildingname' => $b->name,
            'intro' => $b->introduction,
            'yuyue' => $b->status,
            'pic' =>$b->pictureurl
        ]);
        return $this->fetch();
    }

}
