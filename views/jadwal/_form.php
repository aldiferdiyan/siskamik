<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $list_matkul = \yii\helpers\ArrayHelper::map(\app\models\MataKuliah::find()->all(),"id","nama_mata_kuliah");
    $list_nim = \yii\helpers\ArrayHelper::map(\app\models\Mahasiswa::find()->all(),"nim",'nim');
     ?>
    <?= $form->field($model, 'id_matkul')->dropDownList($list_matkul) ?>

    <?= $form->field($model, 'nim')->dropDownList($list_nim) ?>

    <?= $form->field($model, 'hari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai')->textInput() ?>

    <?= $form->field($model, 'selesai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
