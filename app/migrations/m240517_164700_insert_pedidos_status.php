<?php

use app\models\Pedido;
use app\models\PedidoStatus;
use yii\db\Migration;

/**
 * Class m240517_164700_insert_pedidos_status
 */
class m240517_164700_insert_pedidos_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $p1 = new PedidoStatus();
        $p1->id = 1;
        $p1->descricao = 'Solicitado';
        $p1->save();

        $p2 = new PedidoStatus();
        $p2->id = 2;
        $p2->descricao = 'Concluído';
        $p2->save();

        $p3 = new PedidoStatus();
        $p3->id = 3;
        $p3->descricao = 'Cancelado';
        $p3->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $sql1 = 'DELETE FROM '.PedidoStatus::tableName().';';
        $db = Yii::$app->db;
        $db->createCommand($sql1)->execute();
    }


}
