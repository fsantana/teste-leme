<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidos_imagens".
 *
 * @property int $id
 * @property int $pedido_id
 * @property string $imagem
 * @property string $capa
 *
 * @property Pedido $pedido
 */
class PedidosImagens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos_imagens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id', 'imagem', 'capa'], 'required'],
            [['pedido_id'], 'integer'],
            [['imagem', 'capa'], 'string', 'max' => 255],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::class, 'targetAttribute' => ['pedido_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pedido_id' => 'Pedido ID',
            'imagem' => 'Imagem',
            'capa' => 'Capa',
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::class, ['id' => 'pedido_id']);
    }
}
