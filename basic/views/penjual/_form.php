<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Penjual $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="penjual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_penjual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_penjual')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
