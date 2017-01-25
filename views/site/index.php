<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\LinkPager;
    use yii\web\UrlManager;


/* @var $this yii\web\View */

$this->title = 'Vlad Reznichenko blog';
?>
<div class="blog_container row">
    <ul>
    <?php foreach ($articles as $article): ?>
        <div class="Article">
                <a href="<? echo Url::toRoute(array('/site/post','id' => $article->article_id)); ?>"><h2 class="Artic_title"><?= Html::encode("{$article->title}") ?></h2></a>
                <div class="Post_image col-sm-3 col-xs-3 pull-left">
                    <img style="float:left;" class="img-thumbnail"src="<?= Html::encode("{$article->img}") ?>"alt="Изучение CMS Joomla" />
                </div>
                <p class="Artic_mess"><?= Html::encode("{$article->short_article}") ?></p>
                <a class="Read_more" href="<?php echo Url::toRoute(array('/site/post','id' => $article->article_id)); ?>">Читать</a>
                <p class="Artic_date"><?= $article->date_add ?></p>
                <div class="clear"></div>
        </div>
    <?php endforeach; ?>
    </ul>
    <div class="clear"></div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>

</div>
