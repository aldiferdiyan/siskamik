<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box">
<div class="box-body">
    <?php $form = ActiveForm::begin(); ?>
    <?php $list_nim = \yii\helpers\ArrayHelper::map(\app\models\Mahasiswa::find()->all(),"nim",'nim');
 ?>
    <?= $form->field($model, 'nim')->dropDownList($list_nim) ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <?= $form->field($model, 'jumlah_bayar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
