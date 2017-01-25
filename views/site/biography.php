<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>
<h1 class = "biography_test"><?= Html::encode("{$biography->title}") ?></h1>
<!-- <p class = "biography_mess"> -->
    <?= Html::decode("{$biography->message}") ?>
<!-- </p> -->
