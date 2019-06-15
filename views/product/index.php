<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cat_id',
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
