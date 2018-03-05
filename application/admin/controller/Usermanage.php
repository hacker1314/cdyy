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
 * Description of Usermanage
 *
 * @author 陈
 */
class Usermanage extends Controller {

    //put your code here
    //用户管理首页
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
        return $this->fetch();
    }

    //用户输出API
    public function userlist($id = 1, $page = 1, $limit = 10) {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $utpe = Usertype::getById($id);
        //分页查询
        $user = User::where('usertype', '=', $id)->field(['id', 'name', 'mail', 'status', 'phonenumber', 'registertime', 'lastlogintime'])->limit(($page - 1) * $limit, $page * $limit)->select();
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $utpe->count, $user);
        dump($rs1);
    }

    //用户搜索API
    public function finduser($id = 1, $page = 1, $limit = 10, $name = '') {
        if ($name == '')
            return $this->redirect('Usermanage/userlist', ['id' => $id, 'page' => $page, 'limit' => $limit]);
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $utpe = Usertype::getById($id);
        //分页查询
        $user = User::where([
                    'usertype' => ['=', $id],
                    'name' => ['like', '%' . $name . '%'],
                ])->field(['id', 'name', 'mail', 'status', 'phonenumber', 'registertime', 'lastlogintime'])->limit(($page - 1) * $limit, $page * $limit)->select();
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $utpe->count, $user);
        dump($rs1);
    }

    //用户删除API
    public function del($id = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($id == Session::get($id))
            return '对不起，无法删除当前登录的用户！';
        if ($id == 1)
            return '系统默认管理员禁止删除！';
        $user = User::get($id);
        if ($user) {
            $utype = Usertype::get($user->usertype);
            $utype->count = $utype->count - 1;
            $utype->save();
            $user->delete();
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    //用户密码重置API
    public function resetpwd($id = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($id == Session::get($id))
            return '对不起，无法删除当前登录的用户！';
        if ($id == 1)
            return '系统默认管理员禁止重置密码！';
        $user = User::get($id);
        if ($user) {
            $user->password = md5('12345678');
            $user->save();
            return '重置密码成功，初始密码为：12345678';
        } else {
            return '需要重置的用户不存在';
        }
    }

    //用户状态审核
    public function check($id = "", $st = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($id == Session::get($id))
            return '对不起，无法审核当前登录用户！';
        if ($id == 1)
            return '系统默认管理员禁止被审核！';
        $user = User::get($id);
        if ($user) {
            if ($user->status == '限制3周' && $st == '限制3周')
                return '该用户已经被限制3周！';
            if ($st == '限制3周' && $user->status != '限制3周') {
                $blackhome = new Blackhome;
                $blackhome->id = $id;
                $blackhome->forbiddentime = date("Y-m-d H:i:s", time());
                $blackhome->reason = '被管理员' . Session::get('name') . '禁止！';
                $blackhome->save();
            }
            if ($user->status == '限制3周' && $st == '正常') {
                $blackhome1 = Blackhome::get($id);
                $blackhome1->delete();
            }
            $user->status = $st;
            $user->save();
            return '已审核为：' . $st;
        } else {
            return '需要审核的用户不存在';
        }
    }

    //用户添加界面
    public function addu($id = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $this->assign('id', $id);
        return $this->fetch();
    }

    //用户添加api
    public function adduser($username = '', $phonenumber = '', $mail = '', $password = '', $status = '', $id = '') {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $user = User::getByname($username);
        if (!$user) {
            $newuser = new User;
            $newuser->usertype = $id;
            $newuser->name = $username;
            $newuser->mail = $mail;
            $newuser->phonenumber = $phonenumber;
            $newuser->status = $status;
            $newuser->registertime = date("Y-m-d H:i:s", time());
            $newuser->password = md5($password);
            $newuser->save();
            $up = Usertype::get($id);
            $up->count = $up->count + 1;
            $up->save();
            return '用户添加成功！';
        } else
            return '用户名已经存在！';
    }

    //查询未审查用户
    public function unchecklist($check="",$id="",$page = 1, $limit = 10) {
         if (!Session::has('id'))
            return $this->redirect('Index/login');
        $utpe = Usertype::getById($id);
        //分页查询
        $user = User::where(['usertype' => ['=', $id],
                    'status' => ['=', $check]])->field(['id', 'name', 'mail', 'status', 'phonenumber', 'registertime', 'lastlogintime'])->limit(($page - 1) * $limit, $page * $limit)->select();
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $utpe->ucount, $user);
        dump($rs1);
    }
}
