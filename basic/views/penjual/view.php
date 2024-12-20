<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Penjual $model */

$this->title = $model->id_penjual;
$this->params['breadcrumbs'][] = ['label' => 'Penjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penjual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_penjual' => $model->id_penjual], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_penjual' => $model->id_penjual], [
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
            'nama_penjual',
            'id_penjual',
            'alamat:ntext',
            'telepon',
        ],
    ]) ?>

</div>
