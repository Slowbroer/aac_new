<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-12-26
 * Time: 10:22
 */

namespace app\models;

use yii;
use yii\base\Model;

class CommentForm extends Model{

    public $content;
    public $blog_id;
    public $level;



    public function rules(){
        return [
            [["content"],'required'],
            [['content'],'string'],
            [['blog_id','level'],'integer']
        ];
    }

    public function attributeLabels(){
        return [
            'content'=> "content",
            'blog_id'=>'blog_id',
//            'level' => 'level'
        ];
    }

    public function add_comment($user_id,$blog_id = 0)
    {
        if(!$this->validate())
        {
            return false;
        }

        $comment = new Comment();
        $comment->content = $this->content;
        $comment->ann_id = $blog_id;
        $comment->add_time = time();
        $comment->user_id = $user_id;
        return $comment->save()? true:false;
    }




}