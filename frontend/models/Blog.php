<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property string $id
 * @property string $title
 * @property integer $user_id
 * @property string $content
 * @property string $user_name
 * @property integer $cat_id
 * @property string $brief
 * @property string $key_word
 * @property integer $check_time
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['title', 'user_id', 'content', 'cat_id', 'brief', 'key_word'], 'required'],
            [['title', 'user_id', 'content'], 'required'],
            [['user_id', 'cat_id','check_time'], 'integer'],
            [['content', 'key_word'], 'string'],
            [['title', 'user_name', 'brief'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
            'content' => 'Content',
            'user_name' => 'User Name',
            'cat_id' => 'Cat ID',
            'brief' => 'Brief',
            'key_word' => 'Key Word',
            'check_time' => 'check_time',
        ];
    }

//    public function getBlogCat($user_id)
//    {
//        $this->find()
//    }

    public function info($id)
    {
        $blog = $this->find()->where(['id'=>$id])->one();

        $blog->check_time = time();
        $result = $blog->save();

//        var_dump($result);

        return $blog;
    }

    public function getRecent($user_id)
    {
//        var_dump($user_id);
        return $this->find()->where(['user_id'=>$user_id])->orderBy("check_time desc")->asArray()->all();
    }

    public function del($user_id,$blog_id)
    {
        $blog = $this->find()->where(['user_id'=>$user_id,'id'=>$blog_id])->one();
        $blog->delete();
    }


    public function recent_time($blog_id)
    {
        $time = time();

    }

    public function getList($user_id)
    {
        return $this->find()->where(['user_id'=>$user_id])->asArray()->all();
    }



}
