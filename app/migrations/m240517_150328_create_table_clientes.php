<?php

use yii\db\Migration;

/**
 * Class m240517_150328_create_table_clientes
 */
class m240517_150328_create_table_clientes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clientes', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'cpf' => $this->string(15)->notNull(),
            'data_nasc' => $this->date()->notNull(),
            'telefone' => $this->string(15),
            'ativo' => $this->tinyInteger(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clientes');
    }


}
