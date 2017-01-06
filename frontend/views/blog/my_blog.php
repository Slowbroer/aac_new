
<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-10-20
 * Time: 13:46
 */
use frontend\assets\UserAsset;
use yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;
use \ijackua\lepture\MarkdowneditorAssets;
use \ijackua\lepture\Markdowneditor;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;


$this->title = 'My Blog';
UserAsset::register($this);


?>

<div class="panel panel-success" style="margin: 20px auto;width: 95%">
    <?php foreach($model as $list){ ?>
        <div class="panel-heading">
            <a href="<?php echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?>"><?= $list['title'] ?></a>
            <a style="float: right;padding-left: 10px" href="#" onclick="del_blog(<?php echo $list['id'] ?>)">删除</a>
            <a style="float: right;" href="<?php echo \yii\helpers\Url::toRoute('blog/edit').'&id='.$list['id'] ?>">编辑</a>
        </div>

    <?php } ?>
</div>