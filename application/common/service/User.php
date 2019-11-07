<?php


namespace app\common\service;


use think\facade\Session;

class User extends \app\common\logic\User
{
    public function login($user) {
        Session::clear();
        Session::set('login:user', $user);
    }

    public function getUser() {
        return Session::get('login:user');
    }

    public function isLogin() {
        return !!Session::get('login:user');
    }

    public function logout() {
        Session::clear();
    }
}