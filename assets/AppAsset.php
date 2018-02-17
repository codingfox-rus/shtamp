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
        'prettyPhoto/css/prettyPhoto.css',
        'css/font-awesome.css',
        'lightbox2/src/css/lightbox.css',
        'css/site.css',
        'spoiler/spoiler.css',
        'css/style.css',
        'css/widgets/spoiler.css',
    ];
    public $js = [
        'prettyPhoto/js/jquery.prettyPhoto.js',
        'lightbox2/src/js/lightbox.js',
        'spoiler/spoiler.js',
        'js/script.js',
        'js/widgets/spoiler.js',
        'js/jquery.tagcanvas.min.js',
        'ckeditor/ckeditor.js',
        'js/fixes.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
