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
    public function index($id="") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $this->assign('name',Session::get('name'));
        $list1 = Usertype::all();
        $list2 = Articletype::all();
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $typename= Usertype::getById($id);
        $this->assign('typename', $typename->name);
        $this->assign('uid', $id);
        return $this->fetch();
    }
    
    public function userlist($id=1,$page=1,$limit=10) {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        $utpe= Usertype::getById($id);
        //分页查询
        $user = User::where('usertype','=',$id)->field(['id','name','phonenumber','registertime'])->limit(($page-1)*$limit,$page*$limit)->select();
        //common文件设置json转换方法
        $rs1=json(0,'数据返回成功',$utpe->count,$user);
        dump($rs1);
    }
}
