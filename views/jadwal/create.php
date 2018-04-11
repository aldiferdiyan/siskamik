<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$this->title = 'Buat Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-create">

 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
