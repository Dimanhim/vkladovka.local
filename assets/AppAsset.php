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

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    public function getCss()
    {
        return [

        ];
    }
    public function getJs()
    {
        return [
            'js/bootstrap.js',
            'js/jquery.fancybox.min.js',
            'js/owl.carousel.min.js',
            'js/inputmask.js',
            'js/jquery.inputmask.js',
            //'js/bootstrap-datetimepicker.min.js',
            'js/jquery-ui.min.js',
            'js/common.js?v='.mt_rand(1000,100000),
            '/js/storage.js',
        ];
    }
    public function init()
    {
        $this->css = self::getCss();
        $this->js = self::getJs();
    }
}
