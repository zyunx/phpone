<?php


namespace app\common\model;


use think\Model;

class PayOrder extends Model
{
    /**
     * state column values
     * 1: 等待获取支付代码
     * 2: 等待用户支付
     * 3: 已支付, 等待回调
     * 4: 回调成功
     */
    const STATE_WAIT_CODE = 1;
    const STATE_WAIT_PAY = 2;
    const STATE_WAIT_NOTIFY = 3;
    const STATE_SUCCESS = 4;
}