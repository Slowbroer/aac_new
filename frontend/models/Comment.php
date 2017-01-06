<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $user_id
 * @property integer $add_time
 * @property integer $is_show
 * @property integer $ann_id
 * @property integer $level
 * @property integer $blog_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'user_id', 'ann_id',], 'required'],
            [['content'], 'string'],
            [['user_id', 'add_time', 'is_show', 'ann_id', 'level'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'ÄÚÈİ',
            'user_id' => 'User ID',
            'add_time' => 'Add Time',
            'is_show' => 'Is Show',
            'ann_id' => 'Ann ID',
            'level' => 'Level',
        ];
    }


    public function comment_list($blog_id)
    {
        $lists = $this->find()->where(['ann_id'=>$blog_id])->orderBy("add_time")->asArray()->all();
        foreach($lists as $key => $list)
        {
            $lists[$key]['add_time'] = date("Y-m-d H:m",$list['add_time']);
            $user = User::findOne(['id'=>$list['id']]);
            $lists[$key]['user_name'] = $user->username;
        }
        return $lists;

    }




}
