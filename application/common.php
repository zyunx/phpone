<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 逻辑
 * 逻辑考虑的范围在某个子系统
 * @param $name
 * @return \think\Model
 */
function logic($name) {
    return model($name, 'logic');
}

/**
 * 服务
 * 服务考虑多个系统，组合后提供给用户
 * @param $name
 * @return \think\Model
 */
function service($name) {
    return model($name, 'service');
}

function str_rand($length = 32,
                  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    if (!is_int($length) || $length < 0) {
        return false;
    }

    $characters_length = strlen($characters) - 1;
    $string = '';

    for ($i = $length; $i > 0; $i--) {
        $string .= $characters[mt_rand(0, $characters_length)];
    }
    return $string;
}
