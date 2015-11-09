<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
        'AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'AdminLTE-2.3.0/plugins/plugins/jvectormap/jquery-jvectormap-1.2.2.css',        
        'AdminLTE-2.3.0/dist/css/AdminLTE.min.css',
        'AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css',
    ];
    public $js = [
        'AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js',
        'AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js',        
        'AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js',
        'AdminLTE-2.3.0/dist/js/app.min.js',
        'AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js',
        'AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js',
        'AdminLTE-2.3.0/plugins/chartjs/Chart.min.js',
        'AdminLTE-2.3.0/dist/js/pages/dashboard2.js',
    ];   
}
