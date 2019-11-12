<?php


namespace app\index\controller;

use think\facade\Request;

class Conf extends \app\index\common\controller\BaseController
{
    public function index() {
        return $this->fetch();
    }

    public function listPaged() {
        $key = input('key', '');

        return $this->resultLayuiPrevNextPagedList(model('Conf')->where('key', 'like', "%$key%"));
    }

    public function add() {
        if ( ! $this->request->isGet()) {
            return $this->postAdd();
        }

        return $this->fetch();
    }

    public function postAdd() {
        $confModel = model('Conf');

        $conf = Request::only(['key', 'value', 'state' => 0]);

        if ($confModel->where('key', $conf['key'])->find()) {
            return $this->error('配置名已存在');
        }

        if ($conf['state'] !== 0) {
            $conf['state'] = 1;
        }

        \app\common\model\Conf::create($conf);

        return $this->success();
    }

    public function del() {
        $id = Request::param('id', 0);
        if (empty($id)) {
            return $this->error();
        }

        $confModel = model('Conf');
        $confModel->where('id', input('id'))->delete();
        return $this->success();
    }

    public function edit() {
        $allowField = ['key', 'value'];
        $updateData = Request::only($allowField);

        $id = Request::param('id');
        $uniqFields = [['key']];

        $confModel = model('Conf');
        foreach ($uniqFields as $uniq) {
            if ($confModel
                    ->where(array_intersect_key($updateData, array_fill_keys($uniq, true)))
                    ->find()) {
                return $this->error('编辑失败');
            }
        }

        $confModel->where('id', $id)->update($updateData);
        return $this->success();
    }

    public function toggle() {
        $id = Request::param('id', 0);
        if (empty($id)) {
            return $this->error();
        }

        $confModel = model('Conf');

        $conf = $confModel->find(['id' => $id]);
        if ($conf->state == 0) {
            $conf->state = 1;
        } else {
            $conf->state = 0;
        }
        $confModel->where('id', $id)->update(['state' => $conf->state]);
        return $this->success();
    }
}