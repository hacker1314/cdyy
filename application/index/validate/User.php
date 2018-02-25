<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\index\validate;

use think\Validate;

/**
 * Description of User
 *
 * @author 陈
 */
class User extends Validate {

    //put your code here
    // 验证规则
    protected $rule = [
        ['nickname', 'require|min:5', '昵称必须|昵称不能短于5个字符'],
        ['email', 'require|email', '邮箱必须|邮箱格式错误'],
        ['password', 'require|min:5', '密码必须|密码不能短于5个字符'],
    ];

}
