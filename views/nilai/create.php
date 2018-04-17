<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nilai */

$this->title = 'Tambah Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
