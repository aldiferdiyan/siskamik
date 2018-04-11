<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Jadwals';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
  <?= Html::a('Create Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="box">
  <div class="box-body">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'nim',
        'hari',
        'mulai',
        //'selesai',

        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>
  </div>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
