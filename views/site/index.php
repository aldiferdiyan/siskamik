<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="box">
  <div class="box-body">
    <div class="row">
      <div class="col-md-3">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo \app\models\Mahasiswa::find()->count(); ?></h3>
            <p>Data Mahasiswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="./?page=user" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>

      </div><!-- ./col -->
      <div class="col-md-3">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo \app\models\MataKuliah::find()->count(); ?></h3>
            <p>Data Mata kuliah</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?php echo Url::to(['mata-kuliah/index']) ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo \app\models\Jadwal::find()->count(); ?></h3>
            <p>Data Jadwal</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?php echo Url::to(['jadwal/index']) ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div><!-- /.row -->
  </div>
</div>
