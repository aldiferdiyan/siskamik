<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
  <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="box">
  <div class="box-body">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'username',
        'nama',

        [
          'class' => 'yii\grid\ActionColumn',
          'template' => '{delete} {update} {view} ',
          'buttons'=>[
            'view' => function ($url, $model, $key) {
              return Html::a('<i class="fa fa-eye"></i>', ['view','id' => $model->id]);
            }
          ]
        ],
      ],
    ]); ?>
  </div>

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




</div>
