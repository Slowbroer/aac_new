<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-07
 * Time: 9:16
 */

namespace frontend\controllers;


use app\models\Catalog;
use yii\web\Controller;

class CatalogController extends Controller {

    public function actionInfo()
    {
//        die("111");
        $cat_id = $_GET['id'];
//        die($cat_id);
        $catalog = new Catalog();
        $cat_info = $catalog->catInfo($cat_id);
        $blog_list = $catalog->blog_list($cat_id);
//        var_dump($cat_id);
//        $second = $catalog->getSec($cat_id);

        return $this->render('info',['catalog'=>$cat_info,'blog_list'=>$blog_list]);

    }





}