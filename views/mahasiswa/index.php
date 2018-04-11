<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
  <?= Html::a('Create Mahasiswa', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box">
  <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'nim',
        //'password',
        'nama_lengkap',

        [
          'class' => 'yii\grid\ActionColumn',
          'template' => '{delete} {update} {view} ',
          'buttons'=>[
            'view' => function ($url, $model, $key) {
              return Html::a('<i class="fa fa-eye"></i>', ['view','nim' => $model->nim]);
            }
          ]
        ],
      ],
    ]); ?>
  </div>
</div>
