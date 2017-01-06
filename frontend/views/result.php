<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-10-09
 * Time: 14:07
 */

?>

<div style="width: 50%;margin: 50px auto">
    <?php if($result['code']==0){
        ?>

    <h1 style="text-align: center;color: #f0ad4e">出错了</h1>

    <?php

    }
    else
    {
        ?>

    <h1 style="text-align: center;color: #f0ad4e">成功啦啦啦啦</h1>

    <?php

    }
    ?>
    <div class="error_content">
        <pre style="color: #9d9d9d;font-size: 1.2em;font-weight:bold;";><?php echo $result['content']; ?></<pre>
    </div>
    <div style="margin: 10px auto;text-align: center">
        <a href="index.php?r=user/center">返回个人主页</a>
    </div>

</div>