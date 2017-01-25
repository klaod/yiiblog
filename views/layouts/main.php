<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon2.png" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="row" id="header">
        <div class="container">
            <div class="col-sm-3 col-xs-3 pull-left logo">
                <img class="img-responsive"src="logo3.png"alt="Изучение CMS Joomla" />
            </div>
            <div class="col-md-4 cpull-left header_t_block ">
                <p class="header_text">Come to the web side..</p>
                <div class="lightsaber">
                    <div class="handle"></div>
                    <div class="blade"></div>
                    <div class="edge"></div>
                </div>
            </div>
            <div class="col-md-9 pull-left">
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'nav nav-tabs navbar-left '],
                    'items' => [
                        ['label' => 'Блог', 'url' => ['/site/index']],
                        ['label' => 'Биография', 'url' => ['/site/biography']],
                        ['label' => 'Портфолио', 'url' => ['/site/portfolio']],
                        /*Yii::$app->user->isGuest ?
                            ['label' => 'Login', 'url' => ['/site/login']] :
                            [
                                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post']
                            ],*/
                    ],
                ]);
                ?>
            </div>
        </div>

    </div>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>Vlad Reznichenko blog <strong>email:</strong> reznichenkovo@gmail.com <strong>skype:</strong>dangernarog</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
