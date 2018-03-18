<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\login\controller;
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
    public function index(){
        return $this->fetch();
    }
}
