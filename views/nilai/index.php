<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Create Nilai', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="box">
  <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mata_kuliah',
            'nim',
            'nilai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
</div>
