<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-08
 * Time: 15:36
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class CatalogAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/blog.css",
    ];
}