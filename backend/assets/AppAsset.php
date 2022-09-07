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
        'css/site.css',
        'plugins/fontawesome/css/all.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'dist/css/adminlte.min.css'
    ];
    public $js = [
        'plugins/jquery/jquery.min.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
