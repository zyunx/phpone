<?php


namespace app\install\controller;


use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index() {
        $userService = model('User', 'service');
        $userService->createUser('root', 'root');
        echo '安装成功! 务必删除此模块';
    }
}