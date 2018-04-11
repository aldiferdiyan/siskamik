<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

# contoh panggil matkul relasi 
# echo $jadwal->matkul->nama_mata_kuliah;

$this->title = $model->matkul->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">

 
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'=>"Matkul",
                "value"=>$model->matkul->nama_mata_kuliah
            ],
            // 'id_matkul',
            'nim',
            'hari',
            'mulai',
            'selesai',
        ],
    ]) ?>

</div>
</div>
