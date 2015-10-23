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
        'bootstrap/css/bootstrap.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'dist/css/AdminLTE.css',
        'plugins/iCheck/square/blue.css',
        'dist/css/skins/_all-skins.min.css',
    	'plugins/select2/select2.min.css',
    ];
    public $js = [
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
    	'plugins/select2/select2.full.min.js',
    	'plugins/iCheck/icheck.min.js',
    	'plugins/fastclick/fastclick.min.js',
    	'dist/js/app.min.js',
    	'plugins/sparkline/jquery.sparkline.min.js',
    	'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    	'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    	'plugins/slimScroll/jquery.slimscroll.min.js',
    	'plugins/chartjs/Chart.min.js',
    	//'dist/js/pages/dashboard2.js',
    	'js/ready.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
