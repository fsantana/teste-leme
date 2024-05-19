<?php

use app\models\Pedido;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Pedido', ['create'], ['class' => 'btn btn-success']) ?>
 

    
        <?=  ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => ['id','produto', 'valor', 'data',
    [
        'attribute' => 'pedido_status_id',
        'label' => 'Status',
        'value' =>  'pedidoStatus.descricao'],
    [
        'attribute' => 'cliente_id',
        'label' => 'Cliente',
        'value' =>  'cliente.nome'
    ],
    [
        'attribute' => 'cliente_id',
        'label' => 'Telefone',
        'value' =>  'pedidoStatus.telefone'
    ],
    [
        'attribute' => 'cliente_id',
        'label' => 'Cpf',
        'value' =>  'cliente.cpf'
    ]]
]); ?>
    </p>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'produto',
            'valor',
            'data',
            [
                'attribute' => 'pedido_status_id',
                'label' => 'Status',
                'value' =>  'pedidoStatus.descricao'
            ],
            [
                'attribute' => 'cliente_id',
                'label' => 'Cliente',
                'value' =>  'cliente.nome'
            ],
            
            //'ativo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pedido $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
