<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>
<?php foreach ($portfolio as $project): ?>
    <div class="Project">
        <h1 class = "portfolio_title"><?= Html::encode("{$project->title}") ?></h1>
        <div ><?= Html::img($project->image_href,[
                'alt' => $project->title,
                'class' => 'img-responsive']) ?>
        </div>
    </div>
<?php endforeach; ?>
