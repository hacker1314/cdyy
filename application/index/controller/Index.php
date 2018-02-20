<?php

namespace app\index\controller;
use think\Db;
use app\index\model\User;

class Index {

    public function index() {
        return "主页！";
    }
    public function login() {
        return "hello";
    }
    public function LoginCheck($mail='',$pwd=''){
        $user = User::getByMail($mail);
        if($user){
             if($user->password==$pwd)
                 echo $user->name . '<br/>';
             else {
                 echo '密码错误'; 
             }
        }
        else
            echo '邮箱未注册';
       
    }
    
    public function t() {
        return view();
    }

}
