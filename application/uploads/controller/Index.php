<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\uploads\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Request;
/**
 * Description of index
 *
 * @author CJ520
 */
class Index extends Controller{
    //put your code here
     public function index(Request $request) {
        // 获取表单上传文件
        $file = $request->file('file');
        if (empty($file)) {
            return '请选择上传文件';
        }
        // 移动到框架应用根目录目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'image');
        if ($info) {
            $str=$info->getRealPath();
            $i=strlen(ROOT_PATH)+5;
            $str=substr($str,$i);
            $str= str_replace('\\','/',$str);
            return upjson(0, '上传成功', array('src'=>$str));
        } else {
            // 上传失败获取错误信息
            return $file->getError();
        }
    }
}
