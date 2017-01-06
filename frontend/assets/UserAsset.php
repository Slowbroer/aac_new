<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-08-30
 * Time: 11:35
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class UserAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        "js/user.js",
    ];

    public $css = [
        "css/user.css"

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}