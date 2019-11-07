<?php


namespace app\index\controller;


use app\index\common\controller\BaseController;
use think\facade\Request;

class User extends BaseController
{
    public function resetLogin() {
        if ( $this->request->isPost()) {
            return $this->postResetLogin();
        }

        $userService = model('User', 'service');
        $name = $userService->getUser();
        return $this->fetch('', [
            'name' => $name,
        ]);
    }

    public function postResetLogin() {
        $data = Request::only(['name' => '', 'password' => '']);

        $name = $data['name'];
        if (empty($name)) {
            $this->error('用户名不能为空');
        }

        $password = $data['password'];
        if (empty($password)) {
            $this->error('密码不能为空');
        }

        $userService = model('User', 'service');
        $userService->updateUser($data['name'], $data['password']);
        $userService->logout();

        return $this->success();
    }
}