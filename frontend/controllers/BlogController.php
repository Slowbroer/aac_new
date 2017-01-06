<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-03
 * Time: 14:57
 */

namespace frontend\controllers;

use app\models\Blog;
use app\models\Comment;
use app\models\CommentForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class BlogController extends Controller {

    public function actionInfo(){
        $blog_id = Yii::$app->request->get('id');
        if(!is_int(intval($blog_id)))
        {
            return "test";
        }
        $blog = new Blog();
        $blog_info = $blog->info($blog_id);
//        Yii::$app->response->format=Response::FORMAT_JSON;
//        return ['blog'=>$blog];

        $lists = $blog->getList(Yii::$app->user->id);
        $lists_length = count($lists);

        $next = array();
        $last = array();
//        $lists = ArrayHelper::map($lists,'id','title');
        foreach($lists as $key => $value)
        {
            if($value['id']==$blog_id)
            {
                if($key == 0)
                {
                    $next = $lists[1];
                    $last = $lists[$lists_length-1];
                }
                else if($key == $lists_length-1)
                {
                    $next = $lists[0];
                    $last = $lists[$key-1];
                }
                else
                {
                    $next = $lists[$key+1];
                    $last = $lists[$key-1];
                }
            }
        }

        $comment_form = new CommentForm();

        $comment = new Comment();
        $comment_lists = $comment->comment_list($blog_id);


        return $this->render('info',['model'=>$blog_info,'next'=>$next,'last'=>$last,'comment_form'=>$comment_form,'comment_lists'=>$comment_lists]);
    }
    public function actionSave(){
        $data = Yii::$app->request->post('Blog');

        if(empty($data['id']))
        {
            $blog = new Blog();
            $blog['user_id']=Yii::$app->user->id;
        }
        else
        {
            $blog = Blog::findOne($data['id']);
        }



        $blog->load(Yii::$app->request->post());//load函数是更新这个实例变量的数据
//        Yii::$app->response->format=Response::FORMAT_JSON;
        if($blog->save())//这里的save是跳到BaseActiveRecord，但是BaseActiveRecord中save的update是跳到ActiveRecord那边
        {
//            return ['code'=>1,'message'=>'success'];
            $result = array('code'=>1,'content'=>'commit success');
            echo $this->render("/result",['result'=>$result]);
        }

        else
        {
            $result = array('code'=>0,'content'=>'commit faild');
            echo $this->render("/error/error",['result'=>$result]);
//            return ['code'=>0,'message'=>'failed'];
        }
    }

    public function actionDel()
    {
        $blog_id = $_POST['id'];
        $result = array();
        if(empty($blog_id)||!is_numeric($blog_id))
        {
            $result['code']=0;
            return json_encode($result);
        }
        else
        {
            $blog = new Blog();
            $result = $blog->del(Yii::$app->user->id,$blog_id);
        }
    }
    public function actionEdit()
    {
        $blog_id = isset($_GET['id'])? $_GET['id']:0;
        if(empty($blog_id)||!is_numeric($blog_id))
        {
            $result['code']=0;
            $result['content']="参数出错";
            echo $this->render("/error/error",['result'=>$result]);
        }
        else
        {
//            $blog = Blog::findOne($blog_id);
            $blog = new Blog();
            $blog_info = $blog->info($blog_id);
            echo $this->render('edit',['model'=>$blog_info]);

        }

    }

    public function actionAdd()
    {
        $blog = new Blog();
        echo $this->render("add",['model'=>$blog]);
    }



    public function actionList()//我的所有博客
    {
        $blog = new Blog();
        $user_id = Yii::$app->user->id;

        $lists = $blog->getList($user_id);


        echo $this->render("my_blog",['model'=>$lists]);
    }


    public function actionComment(){
        $blog_id = isset($_POST['id'])? $_POST['id']:0;
        $blog = Blog::findOne(['id'=>$blog_id]);//return false if the blog is not found

        if(!$blog)
        {
            return json_encode(array('code'=>0,'message'=>"未找到相应的博客，可能已经被删除"));
        }
        else
        {
            $comment_form = new CommentForm();
            if($comment_form->add_comment(Yii::$app->user->id,$blog_id))
            {
                return json_encode(array('code'=>1,'message'=>"发布成功，等待审核"));
            }
            else
            {
                return json_encode(array('code'=>1,'message'=>"发布失败"));
            }
        }
    }

    public function actionLoad_comment()
    {
        $blog_id = isset($_GET['id'])? $_GET['id']:0;
        if(empty($blog_id))
        {
            return json_encode(array('code'=>0));
        }
        else
        {
            $comment = new Comment();
            $comment_lists = $comment->comment_list($blog_id);
            if(empty($comment_lists))
            {
                return json_encode(array('code'=>0));
            }
            else
            {
                return json_encode($comment_lists);
            }


        }
    }



}