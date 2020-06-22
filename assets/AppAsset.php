<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/libs.min.css',
        //'css/bootstrap.min.css',
        //'css/jquery.fancybox.min.css',
        //'css/bootstrap-datetimepicker3.min.css',
        //'css/main.css',
    ];
    public $js = [
        'js/libs.min.js',
        'js/jquery.fancybox.min.js',
        'js/owl.carousel.min.js',
        'js/inputmask.js',
        'js/jquery.inputmask.js',
        'js/bootstrap-datetimepicker.min.js',
        'js/common.js',
        '/js/storage.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
