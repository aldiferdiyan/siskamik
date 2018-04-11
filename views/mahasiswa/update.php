<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */

$this->title = 'Update '. $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nim, 'url' => ['view', 'id' => $model->nim]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
