<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

function translate($word, $common = "common"){
    return  Yii::t($common, $word);
}

$category = Yii::t('common','Категории');
$this->title = $category;
$this->params['breadcrumbs'][] = $category;
?>
<div class="category-index">

    <h1><?= translate('Категории') ?></h1>

    <p>
        <?= Html::a(Yii::t('common', 'Создать категорию'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
