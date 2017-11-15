<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Product', ['value'=>Url::to('index.php?r=product%2Fcreate'),'class' => 'btn btn-success' ,'id' => 'modelButton'])     ?>
    </p>

    <?php
        Modal::begin([
                'header' => '<h4>Product</h4>',
                'id' => 'modal',
                'size' => 'model-lg',
        ]);

        echo '<div id="modalContent"></div>';
        Modal::end(); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'category.name',
                'label'=>'Category Name',
                'format'=>'text',
            ], 
            'name',
            'price',
            'description',

            ['class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>
</div>
