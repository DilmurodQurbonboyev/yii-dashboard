<?php

use yii\helpers\Html;
use hail812\adminlte\widgets\Menu;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Yii Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= Html::img('@web/img/noImage.jpg', [
                    'alt' => 'noImage',
                    'class' => 'img-circle elevation-2'
                ]) ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucfirst(Yii::$app->user->identity->username) ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'icon' => 'home', 'active' => (Yii::$app->controller->id == 'site') ? 'active' : '',
                        'url' => ['/site']
                    ],
                    [
                        'label' => 'Admin Panel',
                        'icon' => 'user-cog',
                        'active' => [(Yii::$app->controller->id == 'authority*') ? 'active' : ''],

                        'items' => [
                            [
                                'label' => 'Authority',
                                'icon' => 'user-shield',
                                'active' => (Yii::$app->controller->id == 'authority') ? 'active' : '',
                                'url' => ['/authority']
                            ],
                            [
                                'label' => 'Users',
                                'icon' => 'users', 'active' => (Yii::$app->controller->id == 'users') ? 'active' : '',
                                'url' => ['/users']
                            ],
                        ]
                    ],
                    [
                        'label' => 'Site Management',
                        'icon' => 'sitemap',
                        'items' => [
                            [
                                'label' => 'Menus',
                                'icon' => 'bars',
                                'items' => [
                                    [
                                        'label' => 'Menus Categories',
                                        'icon' => 'circle',
                                        'active' => (Yii::$app->controller->id == 'menus-category') ? 'active' : '',
                                        'url' => ['/menus-category']
                                    ],
                                    [
                                        'label' => 'Menus',
                                        'icon' => 'circle',
                                        'active' => (Yii::$app->controller->id == 'menus') ? 'active' : '',
                                        'url' => ['/menus']
                                    ],
                                ]
                            ],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>