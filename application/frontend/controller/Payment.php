<?php


namespace app\frontend\controller;


use app\common\controller\LayuiController;

class Payment extends LayuiController
{
    public function createPay() {
        if ($this->request->isPost()) {
            return $this->postCreatePay();
        }

        return $this->fetch();
    }

    public function postCreatePay() {
        $orderNo = 'NO20019012342398';
        return $this->success('', url('payment/pay', ['orderNo' => $orderNo]));
    }

    public function pay() {
        return $this->fetch();
    }

    public function queryPay() {
        return $this->success();
    }

}