<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-07
 * Time: 9:34
 */
use \yii\helpers\Url;
use \yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;

\frontend\assets\CatalogAsset::register($this);

$this->title = '博客页';
    $bottom = [
        Button::widget(['label' => "<",
            'options'=>[
                'class'=>'btn btn-primary'
            ]
        ]),
    ];
    foreach($blog_list as $blog)
    {
        $bottom[] = Button::widget(['label' => $blog['title'],
            'options'=>[
                'class'=>'btn btn-primary'
            ]
        ]);
    }
    $bottom[] = Button::widget(['label' => ">",
        'options'=>[
            'class'=>'btn btn-primary'
        ]
    ]);

    echo ButtonGroup::widget([
         'buttons' => $bottom,
        'options'=>[
            'class'=>'bottom_blog'
        ]

     ]);
?>
<h3>博客内容</h3>
<div class="blog_content" >
    111

</div>
