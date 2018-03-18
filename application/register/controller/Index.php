<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\register\controller;
use think\Controller;
use think\Db;
use app\index\model\User;
use think\Session;

/**
 * Description of index
 *
 * @author CJ520
 */
class Index extends Controller{
    //put your code here
    //注册资料填写页面
    public function index(){
        return $this->fetch();
    }
    
    //注册检测
    public function reg($name="",$email="",$phone="") {
        
    }
    
    public function email() {
        $toemail='948752180@qq.com';
        $name='ndsy';
        $subject='宁德师范学院-场地预约管理系统-验证码';
        $content='恭喜您已经提交注册，现在请按照注册界面输入验证码。此次验证码为：123456';
        dump(send_mail($toemail,$name,$subject,$content));
    }
}
