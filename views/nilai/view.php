<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nilai */

$this->title = $model->nim;
$this->params['breadcrumbs'][] = ['label' => 'Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
  <div class="box-body">

    <p>
      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
      <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger pull-right',
        'data' => [
          'confirm' => 'Are you sure you want to delete this item?',
          'method' => 'post',
        ],
        ]) ?>
      </p>

      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          [
            'label'=>"Matkul",
            "value"=>$model->matkul->nama_mata_kuliah
          ],
          'nim',
          'nilai',
        ],
        ]) ?>

      </div>
    </div>
