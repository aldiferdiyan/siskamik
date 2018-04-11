<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
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
                  ['label' => 'Dashboard', 'options' => ['class' => 'header']],
                  ['label' => 'mahasiswa', 'icon' => 'user', 'url' => ['/']],

                  ['label' => 'Menu utama', 'options' => ['class' => 'header']],
                  ['label' => 'mahasiswa ok', 'icon' => 'user', 'url' => ['/mahasiswa']],

                  ['label' => 'Admin', 'icon' => 'user text-danger', 'url' => ['/admin']],
                ],
            ]
        ) ?>

    </section>

</aside>
