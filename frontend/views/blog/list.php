<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-27
 * Time: 15:14
 */
use \yii\bootstrap\Html;
?>


<!--<ul class="list-group">-->
<!--    --><?php //foreach($lists as $list){ ?>
<!--    <li class="list-group-item">-->
<!--        <span class="badge"></span>-->
<!--        <a href="--><?php //echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?><!--">--><?//= $list['title'] ?><!--</a>-->
<!--    </li>-->
<!--    --><?php //} ?>
<!--</ul>-->

<!--<div class="list-group">-->
<!--    --><?php //foreach($lists as $list){ ?>
<!--        <a class="list-group-item" href="--><?php //echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?><!--">--><?//= $list['title'] ?><!--</a>-->
<!--    --><?php //} ?>
<!--</div>-->

<div class="panel panel-success" style="margin: 20px auto;width: 95%">
  <?php foreach($lists as $list){ ?>
    <div class="panel-heading">
        <a href="<?php echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?>"><?= $list['title'] ?></a>
        <a style="float: right;padding-left: 10px" href="#" onclick="del_blog(<?php echo $list['id'] ?>)">删除</a>
        <a style="float: right;" href="<?php echo \yii\helpers\Url::toRoute('blog/edit').'&id='.$list['id'] ?>">编辑</a>
    </div>
<!--    <div class="panel-body">--><?php //echo Html::encode($list['brief'])?><!--</div>-->
  <?php } ?>
</div>

<div style="margin: 10px auto">
    <a href="index.php?r=blog/add">
    <button type="button" class="btn btn-info">新建博客</button>
    </a>
    <a href="index.php?r=blog/list">
        <button type="button" class="btn btn-success">查看所有博客</button>
    </a>
</div>





