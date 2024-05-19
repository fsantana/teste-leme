<?php

use yii\db\Migration;

/**
 * Class m240517_150442_create_table_pedidos
 */
class m240517_150442_create_table_pedidos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pedidos', [
            'id' => $this->primaryKey(),
            'produto' => $this->string(255)->notNull(),
            'valor' => $this->decimal(10,2)->notNull(),
            'data' => $this->dateTime()->notNull(),
            'cliente_id' => $this->integer(10)->notNull(),
            'pedido_status_id' => $this->integer(10)->notNull(),
            'ativo' => $this->tinyInteger(1)->notNull(),
        ]);

        $this->addForeignKey('fk_pedidos_cliente_id','pedidos','cliente_id','clientes','id');

        $this->addForeignKey('fk_pedidos_pedido_status_id','pedidos','pedido_status_id','pedido_status','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pedidos');
    }


}
