<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */

$this->title = $model->produto;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'produto',
            'valor',
            'data',
            'cliente.nome',
            'pedidoStatus.descricao',
            'ativo',
        ],
    ]) ?>

</div>
<p>
        <?= Html::a('Enviar novas Imangens', ['novaimagem', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>


 <div id="ivwever-gallery">
    <?php
    foreach($model->pedidosImagens as $pedidoImagem){
?>
     <div >
        <a href="<?= Url::to($pedidoImagem->imagem, true)?>"  target="_blank">
         <img src="<?= ('/'.$pedidoImagem->capa)?>"/>
    </a>
     </div>

<?php
    }
?>

</div>