<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Category;
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->widget(Select2::className(),[
            'data' => ArrayHelper::map(Category::find()->all(),'id','name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Category','id'=>'category_id'],
            'pluginOptions' => [
                 'allowClear' => true
            ],
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
    
    $('form').on('beforeSubmit',function(e) {
      var form = $(this);
      var formData = form.serialize() ;
      
      $.ajax({
            url : 'index.php?r=product/create',
            type : 'POST',
            data : formData,
            success : function (data) {
                $("#modalContent").modal('hide');
                window.location.reload(true);
            },
            error : function() {
              alert("Something went wrong");
            }
      });
    }).on('submit',function(e) {
      e.preventDefault();
    });

JS;
$this->registerJs($script)
?>