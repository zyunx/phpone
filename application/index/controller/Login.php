<?php


namespace app\index\controller;


use think\Controller;

class Login extends Controller
{
    public function login() {
        if ( ! $this->request->isGet()) {
            return $this->postLogin();
        }

        return $this->fetch();
    }

    protected function postLogin() {
        $name = input('post.name');

        $userService = model('User', 'service');
        if ($userService->authenticate($name, input('post.password'))) {
            $userService->login($name);
            return $this->success('登陆成功', url('index/index'));
        } else {
            return $this->error('用户名或密码错误');
        }
    }

    public function logout() {
        model('User', 'service')->logout();
        return $this->redirect(url('login/login'));
    }
}