<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\bootstrap5\ToggleButtonGroup;

/** @var yii\web\View $this */
/** @var app\models\Cliente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '999.999.999-99'
    ]) ?>

    <?= $form->field($model, 'data_nasc')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'language' => 'pt-br',
        'clientOptions' => [
            'changeMonth' => true,
            'yearRange' => '1996:2024',
            'changeYear' => true
        ],
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ativo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
