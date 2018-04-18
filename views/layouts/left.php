<aside class="main-sidebar">

  <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
      </div>
      <div class="pull-left info">
        <p><?php echo \yii::$app->user->identity->username;?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>



    <?= dmstr\widgets\Menu::widget(
      [
        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
        'items' => [
          ['label' => 'Menu', 'options' => ['class' => 'header']],
          ['label' => 'Beranda', 'icon' => 'dashboard', 'url' => ['/']],
          ['label' => 'Menu utama', 'options' => ['class' => 'header']],
          [
            'label' => 'Mahasiswa',
            'icon' => 'id-card ',
            'url' => ['/mahasiswa'],
            // 'items' => [
            //   [
            //     'label' => 'Tambah',
            //     'icon' => 'circle-o',
            //     'url' => ['/mahasiswa/create'],
            //   ],
            //   [
            //     'label' => 'Kelola',
            //     'icon' => 'circle-o',
            //     'url' => ['/mahasiswa/index'],
            //   ]
            // ],
          ],
          [
            'label' => 'Nilai',
            'icon' => 'list-ol',
            'url' => ['/nilai'],
            // 'items'=> [
            //   [
            //     'label'=>'Tambah',
            //     'icon'=>'circle',
            //     'url'=>['/nilai/create'],
            //   ],
            //   [
            //     'label'=>'Kelola',
            //     'icon'=>'circle',
            //     'url'=>['/nilai/index'],
            //   ]
            // ],
          ],
          ['label' => 'Jadwal', 'icon' => 'calendar', 'url' => ['/jadwal']],
          ['label' => 'Mata Kuliah', 'icon' => 'address-book ', 'url' => ['/mata-kuliah']],
          ['label' => 'Pembayaran', 'icon' => 'dollar', 'url' => ['/pembayaran']],
          ['label' => 'Admin', 'icon' => 'user text-danger', 'url' => ['/admin']],
        ],
      ]
      ) ?>

    </section>

  </aside>
