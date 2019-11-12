<?php


namespace app\index\common\controller;

use app\common\controller\LayuiController;
use \think\Controller;

class BaseController extends LayuiController
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