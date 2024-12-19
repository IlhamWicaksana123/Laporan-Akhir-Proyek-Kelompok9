<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Penjual $model */

$this->title = 'Update Penjual: ' . $model->id_penjual;
$this->params['breadcrumbs'][] = ['label' => 'Penjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penjual, 'url' => ['view', 'id_penjual' => $model->id_penjual]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
