<?php

use app\models\Cliente;
use app\models\PedidoStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'language' => 'pt-br',
        'clientOptions' => [
            'changeMonth' => true,
            'yearRange' => '1996:2024',
            'changeYear' => true
        ],
        'options' => ['class' => 'form-control'],
    ]) ?>


    <?php 
    echo $form->field($model, 'cliente_id')->dropDownList(ArrayHelper::map(Cliente::find()->orderBy('nome')->all(), 'id', 'nome'),
        ['prompt'=>'Selecione']
    );
    ?>

    <?php 
    echo $form->field($model, 'pedido_status_id')->dropDownList(ArrayHelper::map(PedidoStatus::find()->orderBy('descricao')->all(), 'id', 'descricao'),
        ['prompt'=>'Selecione']
    );
    ?>

    <?= $form->field($model, 'ativo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
