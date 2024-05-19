<?php

use yii\db\Migration;

/**
 * Class m240517_150452_create_table_pedidos_imagens
 */
class m240517_150452_create_table_pedidos_imagens extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pedidos_imagens', [
            'id' => $this->primaryKey(),
            'pedido_id' => $this->integer(10)->notNull(),
            'imagem' => $this->string(255)->notNull(),
            'capa' => $this->string(255)->notNull()
        ]);

        $this->addForeignKey('fk_pedidos_imagens_pedido_id','pedidos_imagens','pedido_id','pedidos','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pedidos_imagens');
    }
}
