<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = Html::encode("{$post->title}") ;
?>
<ul>
    <div class="blog_container row">
            <h1 class="Artic_title"><?= Html::encode("{$post->title}") ?>:</h1>
            <!-- <p class="Artic_date"><?= $post->date_add ?></p> -->
            <p class="Artic_mess"><?= Html::encode("{$post->message}") ?></p>
    </div>
</ul>
