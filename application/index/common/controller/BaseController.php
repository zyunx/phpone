<?php


namespace app\index\common\controller;

use \think\Controller;

class BaseController extends Controller
{
    public function initialize()
    {
        parent::initialize();
        $userService = model('User', 'service');
        $isLogin = $userService->isLogin();

        if ( ! $isLogin) {
            return $this->redirect(url('login/login'));
        }
    }
}