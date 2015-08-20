<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
        'css/topbar.css',
    ];
    public $js = [
        'js/ie10-viewport-bug-workaround.js',
        'js/jquery-1.11.1.min.js',
        'js/main.js',
        'js/widget-newposts.js',
        'js/tracking.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsMmpS4V1w_9rNfkHj6-sHCSwmCYjm7Q',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
