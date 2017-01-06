<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-08
 * Time: 17:14
 */
use \yii\widgets\ActiveForm;
use \ijackua\lepture\Markdowneditor;
use \yii\helpers\Html;

?>

<div>
    <p style="width: 49.5%;display: inline-block;text-align: left">
        <a  href="<?= \yii\helpers\Url::toRoute(['blog/info','id'=>$last['id']]);?>">上一篇：<?php echo Html::encode($last['title'])?></a>
    </p>
    <p style="width: 49.5%;display: inline-block;text-align: right">
        <a  href="<?= \yii\helpers\Url::toRoute(['blog/info','id'=>$next['id']]);?>">下一篇：<?php echo Html::encode($next['title'])?></a>
    </p>
</div>

<div class="archives-form">
    <input type="hidden" value="<?php echo $model['id'];?>" name="blog">
<?php //echo $form->field($model,'title');?>
    <h2 style="text-align: center;padding-bottom: 20px;">
        <?php echo Html::encode($model['title'])?>
    </h2>
<!--        这里的$model必须是一个model类的实例，attribute指的是这个model类的一个字段，这个字段用来保存数据-->
<?= \yii\helpers\Markdown::process($model['content']) ?>
<?php //echo Markdowneditor::widget(['model' => $model, 'attribute' => 'content']) ?>
<?php //$form->field($model,'title');?>

<!--<div class="form-group">-->
    <?php //echo Html::submitButton('提交', ['class' => 'btn btn-success']) ?>

<!--</div>-->

</div>



<div style="padding-top: 30px;">
    <h2>评论区</h2>
    <div style='text-align: center;color: #808080;font-size: 2em;' class="comment_content">加载中- - - </div>
</div>

<script>
    $(function(){
        var id = $(".blog").val();
        load_comment(id);
    });
    function load_comment(id)
    {
        $.ajax({
            url:"index.php?r=blog/load_comment&id="+id,
            type:"get",
            success:function(data){
                data = eval("("+data+")");
                if(data.code == 1)
                {
                    $(".comment_content").html(data.content);
                }
                else
                {
                    $(".comment_content").html(data.content);
                }
            }

        });
    }

</script>



<div style="padding-top: 50px;">
    <h2>发布评论：</h2>
    <?php $form = ActiveForm::begin([
        'action'=>\yii\helpers\Url::toRoute('blog/comment'),
    ]); ?>

    <?php echo $form->field($comment_form,'content')->textarea(['style'=>'height:200px;'])->label(false); ?>

    <?php echo $form->field($comment_form,'blog_id')->hiddenInput()->label(false); ?>

    <input type="hidden" name="id" value="<?= $model['id'];?>">

    <?php echo Html::submitButton('提交评论', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
</div>