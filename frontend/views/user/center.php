<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-08-30
 * Time: 11:10
 */
header("Access-Control-Allow-Origin:* ");
use frontend\assets\UserAsset;
use yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;
use \ijackua\lepture\MarkdowneditorAssets;
use \ijackua\lepture\Markdowneditor;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;


$this->title = 'Usercenter';
UserAsset::register($this);
MarkdowneditorAssets::register($this);

?>

<!--<ul class="nav nav-pills">-->
<!--    <li class="active"><a href="#">首页</a></li>-->
<!--<div style="height:100px;margin: 10px 0;">-->
<!--    <div class='headerImg'>-->
<!--        <div class='frosted-glass'>-->

<!--        </div>-->
<!--        <h2 class="weather">个人博客系统</h2>-->
<!--        <img class='weather' src='cloudy.png'>-->
<!--    </div>-->
<!--</div>-->
<style>
    .headerImg{

        height: 100px;
        /*background-color: goldenrod;*/

        background-image: url(<?= Url::to('@web/images/header.jpg', true);?>);
        background-repeat: no-repeat;
        /*background-attachment: fixed;*/
        background-position: center;
        background-size:cover
        /*overflow: hidden;*/

    }

    .weather{

        margin-top: -66px;
        text-align: center;
        color:beige;
        /*margin-left: 50%;*/
        position: relative;
        display: block;

    }

    .frosted-glass{
        /*width: 287px;*/
        height: 100px;
        background: inherit;
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -ms-filter: blur(5px);
        -o-filter: blur(5px);
        filter: blur(5px);
        filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius=4, MakeShadow=false);
    }
</style>

    <?php
//    NavBar::begin(['options' => ['class' => 'blogCat']]);
//    $item = [
//        ['label' => '首页', 'url' => ['/site/index'] ,'options'=>['class'=>'active']]
//    ];
//    foreach($cat_list as $cat)
//    {
//        $sec_cat = [
//            ['label' => '基本语法', 'url' => ['/site/index'] ]
//        ];
//        foreach($cat['sec_cat'] as $sec)
//        {
//            $sec_cat[] = ['label' => $sec['cat_name'], 'url' => Url::toRoute('catalog/info').'&id='.$sec['id']];
//        }
//        $item[] = [
//            'label' => $cat['cat_name'],
//            'url' => ['/cat/info/cat_id/'.$cat['id']],
//            'options'=>['class'=>'dropdown'],
//            'items'=>$sec_cat
//        ];
//    }
//    echo Nav::widget([
//        'items' => $item,
//        'options' => ['class' => 'navbar-nav navbar-left'],
//    ]);
//    NavBar::end();
    ?>




<div class="userInfo">

<!--    <div class="tabbable" id="tabs-31545"><!-- Only required for left/right tabs -->
<!--        <ul class="nav nav-tabs">-->
<!--            <li><a contenteditable="true" data-toggle="tab" href="#panel-749367">第一部分</a></li>-->
<!--            <li class="active"><a contenteditable="true" data-toggle="tab" href="#panel-466365">第二部分</a></li>-->
<!--        </ul>-->
<!---->
<!--        <div class="tab-content">-->
<!--            <div class="tab-pane" contenteditable="true" id="panel-749367">-->
<!--                <p>第一部分内容.</p>-->
<!--            </div>-->
<!---->
<!--            <div class="tab-pane active" contenteditable="true" id="panel-466365">-->
<!--                <p>第二部分内容.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="user_img">
<!--        <img src="../web/images/user/user.jpg" class="userImg">-->
<!--        <img src="--><?php //echo Url::toRoute("@web/images/user/user.jpg") ?><!--" class="userImg">--><!--这里的toRoute是会经过index.php这个入口文件的-->
            <img src="<?php echo Url::to("@web/images/user/user.jpg") ?>" class="userImg"><!--而to只会接地址-->
    </div>
<!--
    <div class="user_info">
        <h3><?= Html::encode($user->username) ?></h3>

        <h5><?= Html::encode($user->email) ?></h5>
    </div>
    -->
    <?php

    echo \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => '我的博客',
                'content' => 'loading...',
                'headerOptions'=>['id'=>'myblog_nav'],//这里是头部选项的参数
                'active' => true,
                'options'=>['id'=>'blogContent']
            ],
            [
                'label' => '我的收藏',
                'content' => 'loading...',
                'headerOptions'=>['id'=>'mycollect_nav'],
                'options' => ['id' => 'collectContent'],
            ],
            [
                'label' => 'Example',
                'url' => 'http://www.baidu.com',
            ],
        ],
        'options'=>['class'=>'userContent']
    ]);
    ?>


</div>









<!--    <li class="blog_cat dropdown">-->
<!--        <a  class="dropdown-toggle" data-toggle="dropdown" href="#">PHP<span class="caret"></span></a>-->
<!--                <ul class="dropdown-menu" aria-labelledby="drop1">-->
<!--                    <li><a href="#">基本语法</a></li>-->
<!--                    <li><a href="#">thinkphp</a></li>-->
<!--                    <li><a href="#">Yii</a></li>-->
<!--                </ul>-->
<!--    </li>-->
<!---->
<!--    <li class="blog_cat dropdown">-->
<!--        <a  class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--            HTML-->
<!--            <span class="caret"></span>-->
<!--        </a>-->
<!--        <ul class="dropdown-menu" aria-labelledby="drop1">-->
<!--            <li><a href="#">基本语法</a></li>-->
<!---->
<!--        </ul>-->
<!--    </li>-->
<!---->
<!--    <li class="blog_cat dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--            JS-->
<!--            <span class="caret"></span>-->
<!--        </a>-->
<!--        <ul class="dropdown-menu" aria-labelledby="drop1">-->
<!--            <li><a href="#">基本语法</a></li>-->
<!--            <li><a href="#">Jquery</a></li>-->
<!--            <li><a href="#">bootstrap</a></li>-->
<!--        </ul>-->
<!--    </li>-->
<!---->
<!--    <li class="blog_cat dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">CSS<span class="caret"></span></a>-->
<!--        <ul class="dropdown-menu" aria-labelledby="drop1">-->
<!--            <li><a href="#">基本语法</a></li>-->
<!--            <li><a href="#">less</a></li>-->
<!--        </ul>-->
<!--    </li>-->
<!--</ul>-->

