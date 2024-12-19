<?php

use app\models\Penjual;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PenjualSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penjuals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penjual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_penjual',
            'id_penjual',
            'alamat:ntext',
            'telepon',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penjual $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_penjual' => $model->id_penjual]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
