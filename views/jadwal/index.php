<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Jadwal';
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


        # fungsi relasi
        [
          # label yg muncul di list
          'label' => 'Mata Kuliah',
          'format' => 'raw',
          # variable dari JadwalSearch
          # untuk keperluan Search dan Sorting
          'attribute'=>'matkul',
          # nilai yg di print
          'value' => function($model) {
            # panggil relasi matkul (getMatkul)
            $data = $model->matkul->nama_mata_kuliah
            // ."<br><small>".$model->mulai." s/d ".$model->selesai."</small>"
            ;
            return $data;
          },
        ],


        'nim',
        'hari',
        'mulai',
        'selesai',

        ['class' => 'yii\grid\ActionColumn'],
      ],
      ]); ?>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  </div>
