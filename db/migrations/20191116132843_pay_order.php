<?php

use Phinx\Migration\AbstractMigration;

class PayOrder extends AbstractMigration
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
        $this
            ->table('pay_order', [
                'comment' => '支付订单'
            ])
            ->addColumn('no', 'string', [
                'limit' => 32,
                'comment' => '订单号'
            ])
            ->addColumn('amount', 'decimal', [
                'precision' => 7,
                'scale' => 2,
                'comment' => '订单金额',
            ])
            ->addColumn('remark', 'string', [
                'limit' => 128,
                'comment' => '备注'
            ])
            ->addColumn('order_time', 'integer', [
                'comment' => '下单时间'
            ])
            ->addColumn('deadline_time', 'integer', [
                'comment' => '过期时间'
            ])
            ->addColumn('creator_id', 'integer', [
                'comment' => '订单创建者'
            ])
            ->addColumn('payer_no', 'string', [
                'limit' => 32,
                'comment' => '支付人编号',
            ])
            ->addColumn('pay_time', 'integer', [
                'comment' => '支付时间'
            ])
            ->addColumn('payee_id', 'integer', [
                'limit' => 32,
                'comment' => '收款人',
            ])
            ->addColumn('pay_method', 'string', [
                'limit' => 64,
                'comment' => '支付方式'
            ])
            ->addColumn('pay_code', 'string', [
                'limit' => 64,
                'comment' => '支付代码'
            ])
            ->addColumn('state', 'smallinteger', [
                'comment' => '状态 <1：已删除 0:未知 >1: 存在，自定义',
                'default' => 1
            ])
            ->addColumn('create_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP'
            ])
            ->addColumn('update_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP'
            ])
            ->create();

    }
}
