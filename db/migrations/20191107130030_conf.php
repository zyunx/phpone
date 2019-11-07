<?php

use Phinx\Migration\AbstractMigration;

class Conf extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $conf = $this->table('conf');
        $conf
            ->addColumn('key', 'string', [
                'limit' => 128,
                'comment' => '配置项名称'
            ])
            ->addColumn('value', 'string', [
                'limit' => 128,
                'comment' => '配置项值'
            ])
            ->addColumn('state', 'smallinteger', [
                'comment' => '配置项状态',
                'default' => 1
            ])
            ->addColumn('create_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP'
            ])
            ->addColumn('update_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP'
            ]);

        $conf->create();
    }
}
