<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.css" rel="stylesheet">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php


    $languageItem = new cetver\LanguageSelector\items\DropDownLanguageItem([
        'languages' => [
            'en' => '<span class="flag-icon flag-icon-us"></span> English',
            'ru' => '<span class="flag-icon flag-icon-ru"></span> Russian',
        ],
        'options' => ['encode' => false],
    ]);

    NavBar::begin([
       'brandLabel' => Yii::t('common', 'Компания'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('common', 'Главная'), 'url' => ['/site/index']],
            ['label' => Yii::t('common', 'Товар'), 'url' => ['/product']],
            ['label' => Yii::t('common', 'Категории'), 'url' => ['/category']],
            ['label' => Yii::t('common', 'Отзывы о товаре'), 'url' => ['/review']],
            $languageItem->toArray()

        ],

    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;  <?= Yii::t('common', 'Моя компания '). date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
