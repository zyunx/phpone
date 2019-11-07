<?php


namespace app\index\controller;


use app\index\common\controller\BaseController;

class About extends BaseController
{
    public function index() {
        return $this->fetch();
    }
}