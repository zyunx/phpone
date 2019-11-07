<?php


namespace app\common\logic;


use app\common\model\Conf;
use think\Db;

class User
{
    public function createUser($name, $password) {
        $passwordSalt = str_rand();
        $password = md5( $passwordSalt . $password);

        Conf::create([
            'key' => 'user.name',
            'value' => $name,
        ]);
        Conf::create([
            'key' => 'user.password.salt',
            'value' => $passwordSalt,
        ]);
        Conf::create([
            'key' => 'user.password',
            'value' => $password,
        ]);
    }

    public function updateUser($name, $password) {
        $passwordSalt = str_rand();
        $password = md5( $passwordSalt . $password);

        Db::transaction(function () use ($name, $password, $passwordSalt) {
            Conf::where('key', 'user.name')->update(['value' => $name]);
            Conf::where('key', 'user.password.salt')->update(['value' => $passwordSalt]);
            Conf::where('key', 'user.password')->update(['value' => $password]);
        });
    }


    public function authenticate($name, $password) {
        $trueName = Conf::where('key', 'user.name')->value('value');
        if ($name !== $trueName) {
            return false;
        }


        $truePassword = Conf::where('key', 'user.password')->value('value');
        $passwordSalt = Conf::where('key', 'user.password.salt')->value('value');
        $password = md5($passwordSalt.$password);

        if ($password !== $truePassword) {
            return false;
        }

        return true;
    }
}