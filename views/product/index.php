<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Товары');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Yii::t('common', 'Товары') ?></h1>
    <p>
        <?= Html::a(Yii::t('common', 'Создать товар'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Category',
                'value' => 'category'
            ],
            'title',
            [
                'label' => 'description',
                'value' => 'description',
                'headerOptions' => ['width' => '500']
            ],

            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width' => 100]);
                }
            ],
            [
                'label' => 'price',
                'value' => 'price',
                'content' => function ($data) {
                    return $data->price . ' $';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
