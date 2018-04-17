<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nilai */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box">
  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput() ?>

    <?= $form->field($model, 'nilai')->textInput() ?>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>
