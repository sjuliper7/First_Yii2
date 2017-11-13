<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Customers', ['value'=>Url::to('index.php?r=customer%2Fcreate'),'class' => 'btn btn-success' ,'id' => 'modelButton'])     ?>
    </p>
</div>

    <?php
        Modal::begin([
                'header' => '<h4>Customer</h4>',
                'id' => 'modal',
                'size' => 'model-lg',
        ]);

        echo '<div id="modalContent"></div>';
        Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'customer_name',
            'zip_code',
            'city',
            'province',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
