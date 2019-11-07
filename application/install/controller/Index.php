<?php


namespace app\install\controller;


use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index() {
        Db::name('conf')->insert([
            'key' => 'user.name',
            'value' => 'root',
        ]);

        $passwordSalt = str_rand();
        $password = 'root123456';
        $password = md5($passwordSalt.$password);

        Db::name('conf')->insert([
            'key' => 'user.password',
            'value' => $password,
        ]);

        Db::name('conf')->insert([
            'key' => 'user.password.salt',
            'value' => $passwordSalt,
        ]);

        echo '安装成功! 务必删除此模块';
    }
}