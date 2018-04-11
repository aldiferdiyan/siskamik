<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
  <div class="box">
    <div class="mahasiswa-index">
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <p>
        <?= Html::a('Create Mahasiswa', ['create'], ['class' => 'btn btn-success']) ?>
      </p>

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
            
          ],
        ],
      ]); ?>
    </div>
  </div>

</section>
