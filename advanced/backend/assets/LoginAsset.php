<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Heri Wahyudianto <heriwahyudianto@yahoo.co.id>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'AdminLTE-2.3.0/dist/css/AdminLTE.min.css',
        'AdminLTE-2.3.0/plugins/iCheck/square/blue.css',
    ];
    public $js = [
        'AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js',
        'AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js',
        'AdminLTE-2.3.0/plugins/iCheck/icheck.min.js',
        'mylogin.js'
    ];
   /* public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];*/
}
