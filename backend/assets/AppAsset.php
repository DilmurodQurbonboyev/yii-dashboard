<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin.css'
    ];
    public $js = [
//        'plugins/jquery/jquery.min.js',
//        'plugins/bootstrap/js/bootstrap.bundle.min.js',
//        'dist/js/adminlte.min.js',
//        'js/jquery.fancybox.min.js',
//        'js/admin.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
