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
       //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $this->assign('name', Session::get('name'));
        $list1 = Usertype::all();
        $list2 = Articletype::all();
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $list3 = Gymtype::all();
        $this->assign('list3', $list3);
        $artt = Articletype::get($id);
        $this->assign('artt', $artt->name);
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
        $place = article::where('articletype', '=', $id)->field(['id', 'title', 'username', 'gaiyao', 'time', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $pcount = count(Gym::where('type', '=', $id)->select());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $pcount, $place);
        dump($rs1);
    }

    //搜索文章标题API
    public function find($id = 1, $page = 1, $limit = 10, $name = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($name == '')
            return $this->redirect('art/artlist', ['id' => $id]);
        $art = article::where([
                    'title' => ['like', '%' . $name . '%'],
                    'articletype' => ['=', $id]
                ])->field(['id', 'title', 'username', 'gaiyao', 'time', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $acount = count(article::where([
                    'title' => ['like', '%' . $name . '%'],
                    'articletype' => ['=', $id]
                ])->select());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $acount, $art);
        dump($rs1);
    }

    //文章状态审核
    public function check($id = "", $st = "") {
        if (!Session::has('id'))
            return $this->redirect('Index/login');
        if ($id == Session::get($id))
            return '对不起，无法审核当前登录用户！';
        if ($id == '')
            return '需要审核的文章为空！';
        $art = article::get($id);
        if ($art) {
            if ($st == 1) {
                $art->status = 1;
                $art->save();
                return '该文章审核成功！结果为通过！';
            }
            if ($st == 2) {
                $art->status = 2;
                $art->save();
                return '该文章审核成功！结果为不通过！';
            }
        } else {
            return '需要审核的用户不存在';
        }
    }

    //添加文章
    public function adda($id = 1) {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $this->assign('aid', $id);
        return $this->fetch();
    }

    //添加文章操作
    public function addar($title = '', $keyword = '', $aid = '', $contents = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($title == '')
            return $this->error('标题不能为空请重试！');
        if ($aid == '')
            return $this->error('文章分类不能为空，请重试！');
        if ($keyword == '')
            return $this->error('文章概要不能为空！');
        if (strlen($keyword) > 240)
            return $this->error('文章概要字数超过限定字数，目前已经超出' . (strlen($keyword) - 240) . '字');
        $art = new article;
        $art->title = $title;
        $art->time = date("Y-m-d H:i:s", time());
        $art->userid = Session::get('id');
        $art->username = Session::get('name');
        $art->content = $contents;
        $art->gaiyao = $keyword;
        $art->status = 1;
        $art->articletype = $aid;
        $art->save();
        $ap = Articletype::get($aid);
        $ap->count = $ap->count + 1;
        $ap->save();
        return $this->success('发布成功，请刷新后查看！');
    }

    //删除文章API
    public function del($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($id == '')
            return '对不起，删除失败，您未选择任何文章！';
        $del = article::get($id);
        if ($del) {
            $del->delete();
            return '删除文章成功！';
        } else
            return "需要删除的文章不存在！";
    }

    //搜索未审核文章列表API
    public function uncheck($id = 1, $page = 1, $limit = 10, $status = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($status == '')
            return $this->redirect('art/artlist', ['id' => $id]);
        $art = article::where([
                    'status' => ['=', $status],
                    'articletype' => ['=', $id]
                ])->field(['id', 'title', 'username', 'gaiyao', 'time', 'status'])->limit(($page - 1) * $limit, $page * $limit)->select();
        $acount = count(article::where([
                    'status' => ['=', $status],
                    'articletype' => ['=', $id]
                ])->select());
        //common文件设置json转换方法
        $rs1 = json(0, '数据返回成功', $acount, $art);
        dump($rs1);
    }

    //查看文章
    public function detail($id = "") {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $art = article::get($id);
        $this->assign('content', $art->content);
        return $this->fetch();
    }

    //编辑文章界面
    public function edit($id = '') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        $art = article::get($id);
        $this->assign('content', $art->content);
        $this->assign('aid', $art->articletype);
        $this->assign('title', $art->title);
        $this->assign('gaiyao', $art->gaiyao);
        $this->assign('id', $art->id);
        return $this->fetch();
    }

    //编辑文章API
    public function edita($title = '', $keyword = '', $aid = '', $contents = '',$id='') {
        //判断是否登录
        if (!Session::has('id'))
            return $this->redirect('index/login');
        //效验登录用户是否为后台管理员用户
        $user = User::get(Session::get('id'));
        if ($user->usertype != 1)
            return $this->error('对不起您登录的用户不为管理员用户！');
        if ($title == '')
            return $this->error('标题不能为空请重试！');
        if ($aid == '')
            return $this->error('文章分类不能为空，请重试！');
        if ($keyword == '')
            return $this->error('文章概要不能为空！');
        if (strlen($keyword) > 240)
            return $this->error('文章概要字数超过限定字数，目前已经超出' . (strlen($keyword) - 240) . '字');
        $art = article::get($id);
        $art->title = $title;
        $art->time = date("Y-m-d H:i:s", time());
        $art->userid = Session::get('id');
        $art->username = Session::get('name');
        $art->content = $contents;
        $art->gaiyao = $keyword;
        $art->status = 1;
        $art->articletype = $aid;
        $art->save();
        return $this->success('保存成功，请刷新后查看！');
    }

}
