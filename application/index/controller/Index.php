<?php
namespace app\index\controller;

use app\index\common\controller\BaseController;
use think\Controller;

class Index extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }
}
