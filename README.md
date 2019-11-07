# PHP单用户系统

直接依赖 ThinkPHP, layui, phinx

演示地址：http://phpone.yunshuaisystem.com/

用户名: root

密码: root

## 本地开发

``
git clone https://github.com/zyunx/phpone.git
``

``
cd phone
``

``
curl -s https://getcomposer.org/installer | php
``

``
php composer.phar install
``

``
cp -r config_example config
``

修改数据库配置文件 confg/database.php

``
cp -r phinx_example.yml phinx.yml
``

修改phinx配置 phinx.yml

``
vendor/bin/phinx migrate
``

如果上一步提示权限不够，请执行语句
``
chmod +x vendor/robmorgan/phinx/bin/phinx
``

``
php think run
``

最后浏览器访问 http://127.0.0.0:8000/install 初始化系统


## 第一次安装

``
git archive -o ../phpone.zip master
``

上传phpone.zip到web目录, 并解压。

``
curl -s https://getcomposer.org/installer | php
``

``
php composer.phar install
``

``
cp -r config_example config
``

修改数据库配置文件 confg/database.php

``
cp -r phinx_example.yml phinx.yml
``

修改phinx配置 phinx.yml

``
vendor/bin/phinx migrate
``

如果上一步提示权限不够，请执行语句

``
chmod +x vendor/robmorgan/phinx/bin/phinx
``

接下来的步骤，参考如何部署一个ThinkPHP项目

最后浏览器访问 http://127.0.0.0:8000/install 初始化系统


## 更新安装

** 更新前务必做好原php文件和数据库的备份 **

``
git archive -o ../phpone.zip master
``

上传phpone.zip到web目录, 并解压覆盖原有文件。

``
php composer.phar install
``

``
vendor/bin/phinx migrate
``



