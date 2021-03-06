<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<p>
  <?= Html::a('Create Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="box">
  <div class="box-body">
    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'nim',
        'bulan',
        'jumlah_bayar',

        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>
  </div>
</div>
