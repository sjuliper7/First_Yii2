<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GuitarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guitars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guitar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guitar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'brand',
            'model',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
