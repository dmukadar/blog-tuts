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
//     public $basePath = '@webroot';
//     public $baseUrl = '@web';
    public $sourcePath = '@bower/developer/';
    public $css = [
//         'css/site.css',
    	'assets/plugins/bootstrap/css/bootstrap.min.css',
    	'assets/plugins/font-awesome/css/font-awesome.css',
    	'assets/plugins/github-activity/dist/github-activity-0.1.1.min.css',
    	'assets/plugins/github-activity/dist/octicons/octicons.min.css',
    	'assets/css/styles.css',
    ];
    public $js = [
    	'assets/plugins/jquery-1.11.2.min.js',
    	'assets/plugins/jquery-migrate-1.2.1.min.js',
    	'assets/plugins/bootstrap/js/bootstrap.min.js',
    	'assets/plugins/jquery-rss/dist/jquery.rss.min.js',
    	'assets/plugins/github-activity/dist/mustache/mustache.min.js',
    	'assets/plugins/github-activity/dist/github-activity-0.1.1.min.js',
    	'assets/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
