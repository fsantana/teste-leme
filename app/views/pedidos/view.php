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
        <?= Html::a('Enviar nova Imangem', ['novaimagem', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

<?php
 echo \hoomanMirghasemi\iviewer\IviewerGallery::widget([
     'selectorId' => 'iviewer-gallery-1',
     'modalCloseText' => 'close',
 ]);
 ?>
 <div id="ivwever-gallery">
    <?php
    foreach($model->pedidosImagens as $pedidoImagem){
?>
     <div class="iviewer-gallery-item-holder">
         <img 
              src="<?= ('/'.$pedidoImagem->capa)?>"
              data-iviewer-src="<?= Url::to($pedidoImagem->imagem, true)?>"
              class="iviewer-gallery-item" data-target="#iviewer-gallery-modal" data-toggle="modal"/>
     </div>

<?php
    }
?>

</div>