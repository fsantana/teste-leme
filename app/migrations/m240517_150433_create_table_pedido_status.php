<?php

use yii\db\Migration;

/**
 * Class m240517_150433_create_table_pedido_status
 */
class m240517_150433_create_table_pedido_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pedido_status', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pedido_status');
    }


}
