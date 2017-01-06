<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-08-30
 * Time: 10:11
 */

namespace frontend\controllers;
header("Access-Control-Allow-Origin:* ");
use app\models\Blog;
use app\models\Catalog;
use common\models\User;
use Yii;
use yii\web\Controller;

class UserController extends Controller {

    public $enableCsrfValidation = false;

    public function actionCenter(){
//        var_dump(Yii::$app->user->identity->id);
        $id = Yii::$app->user->identity->id;



        //var_dump($_SESSION);//这里会打印出$_SESSION['id']

//        var_dump( Yii::$app->user);

        $user = User::findIdentity($id);

        $catalog = new Catalog();


        $cat_list = $catalog->getCat($id);
        foreach($cat_list as $key => $cat)
        {
            $cat_list[$key]['sec_cat']=$catalog->getSec($cat['id']);

        }

//        $model = new Blog();
        $model = Blog::find()->where(['id'=>1])->one();





//        var_dump($cat_list);

        return $this->render('center',['cat_list'=>$cat_list,'model'=>$model,'user'=>$user]);
    }

    public function actionRecent_blog(){
//        print_r(Yii::$app->user->identity);
//        if(isset(Yii::$app->user->identity))
//        {
//
//            $user_id = Yii::$app->user->identity->id;
//        }
//        else
//        {
//            $user_id = 2;
//        }

//        $user = Yii::$app->user->identity;
//        print_r($user['id']);


//        var_dump(Yii::$app->user->identity);
//        $user_id = isset($_POST['user_id'])? $_POST['user_id']:0;
        if(!Yii::$app->user->isGuest)
        {
            $user_id = Yii::$app->user->id;
        }
        else
        {
            return "id error";
        }
        $blog = new Blog();
//        $user_id = 2;
        $list = $blog->getRecent($user_id);

//        $list = "test";
        $content = $this->renderPartial('/blog/list',['lists'=>$list]);
        return $content;


//        if(empty($list))
//        {
//            return "failed";
//        }
//        else
//        {
//            $content = $this->renderPartial('/blog/list',['lists'=>$list]);
////            $content = "test";
//            return $content;
//        }


    }

    public function actionTest(){
        $id=$_POST['id'];
    }



}