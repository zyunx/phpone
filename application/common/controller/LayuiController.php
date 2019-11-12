<?php


namespace app\common\controller;


use think\Controller;

class LayuiController extends Controller
{
    public function resultLayuiPrevNextPagedList($query, $page = null, $limit = null) {
        if (empty($page)) {
            $page = input('page/d', 1);
        }
        if (empty($limit)) {
            $limit = input('limit/d', 50);
        }

        $list = $query->limit($limit * ($page - 1), $limit + 1)->select();

        $count = count($list) + $limit * ($page - 1);

        return json([
            'code' => 0,
            'msg' => '',
            'count' => $count,
            'data' => $list,
        ]);
    }
}