<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Locations;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->widget(Select2::className(),[
            'data' => ArrayHelper::map(Locations::find()->all(),'zip_code','zip_code'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Zip Code','id'=>'zip_code'],
            'pluginOptions' => [
                 'allowClear' => true
            ],
    ]);
    ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
    $('#zip_code').change(function() {
        var zip_code = $(this).val();
        //alert(zip_code);
        $.get('index.php?r=location/get-city-province',{zip_code : zip_code},function(data){
                var data =  $.parseJSON(data);   
                //alert(data.city);
                $('#customers-city').attr('value',data.city);
                $('#customers-province').attr('value',data.province);
        });
    });

    $('form').on('beforeSubmit',function(e) {
      var form = $(this);
      var formData = form.serialize() ;
      
      $.ajax({
            url : 'index.php?r=customer/create',
            type : 'POST',
            data : formData,
            success : function (data) {
                //var data = $.parseJSON(data);
                //alert($.parseJSON(data));
                $("#modalContent").modal('hide');
                window.location.reload(true);
                //alert('bisa tapi');
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