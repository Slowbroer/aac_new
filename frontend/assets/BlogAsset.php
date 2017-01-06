<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-08
 * Time: 15:35
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BlogAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        "css/blog.js",
    ];

}