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
 * Description of Userinfo
 *
 * @author 陈
 */
class Userinfo extends Controller {
    //put your code here
     public function index() {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $this->assign('name',Session::get('name'));
        $list1 = Usertype::all();
        $list2 = Articletype::all();
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        return $this->fetch();
    }
    
    public function changepwd($oldpwd="",$newpwd1="",$newpwd2="") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($newpwd1!=$newpwd2)
            $this->error('两次密码输入不一致！');
        $user=User::getById(Session::get('id'));
        if(md5($oldpwd)!=$user->password)
            $this->error('原密码错误！');
        if($newpwd1==$oldpwd)
            $this->error ('新密码与原密码一致，未更改！');
        if(strlen($newpwd1)<8)
            $this->error ('新密码长度过短！');
        $user->password=md5($newpwd1);
        $user->validate(true)->save();
        $this->success('密码修改成功！');
    }
    
}
