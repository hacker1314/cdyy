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
    public function index() {
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
        $list3 = Gymtype::all();
        $this->assign('list3', $list3);

        return $this->fetch();
    }

    //场地列表API
    public function buildinglist($page = 1, $limit = 10) {
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
    public function buildingfind($page = 1, $limit = 10, $name = '') {
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
        if (!Building::getByName($buildingname)) {
            $add = new Building;
            $add->name = $buildingname;
            $add->introduction = $intro;
            $add->status = $yuyue;
            $add->pictureurl = $pic;
            $add->save();
            return $this->success('场地添加成功，请刷新页面查看！');
        } else
            return $this->error('场地已经存在！请勿重复添加！');
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
        $b = Building::get($id);
        $this->assign([
            'buildingname' => $b->name,
            'intro' => $b->introduction,
            'yuyue' => $b->status,
            'pic' => $b->pictureurl,
            'id' => $b->id
        ]);
        return $this->fetch();
    }

    //编辑场地保存处理
    public function editbu($id = '', $buildingname = "", $yuyue = '', $intro = '', $pic = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $b = Building::get($id);
        //判断场地名的情况
        if ($b->name != $buildingname) {
            $bb = Building::where('name', '=', $buildingname)->select();
            if (count($bb) <= 2)
                $b->name = $buildingname;
            else
                return $this->error('您要更改的场地名已经存在！请重试！');
        }
        $b->introduction = $intro;
        $b->status = $yuyue;
        $b->pictureurl = $pic;
        $b->save();
        return $this->success('场地编辑成功！');
    }

    //删除场地
    public function del($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($id == '')
            return '对不起，删除失败，您未选择任何场地！';
        $del = Building::get($id);
        if ($del) {
            $del->delete();
            return '删除场地成功！';
        } else
            return "需要删除的场地不存在！";
    }

}
