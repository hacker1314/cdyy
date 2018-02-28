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
        return $this->fetch();
    }

    //用户输出API
    public function userlist($id = 1, $page = 1, $limit = 10) {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $utpe = Usertype::getById($id);
        //分页查询
        $user = User::where('usertype', '=', $id)->field(['id', 'name', 'mail', 'status','phonenumber', 'registertime', 'lastlogintime'])->limit(($page - 1) * $limit, $page * $limit)->select();
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
            $utype=Usertype::get($user->usertype);
            $utype->count=$utype->count-1;
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
    public function check($id="",$st="") {
         if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($id == Session::get($id))
            return '对不起，无法审核当前登录用户！';
        if ($id == 1)
            return '系统默认管理员禁止被审核！';
        $user = User::get($id);
        if ($user) {
            $user->status = $st;
            $user->save();
            return '已审核为：'.$st;
        } else {
            return '需要审核的用户不存在';
        }
    }
}
