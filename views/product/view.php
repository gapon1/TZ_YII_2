<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common', 'Задать картинку'), ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a(Yii::t('common', 'Оставить отзыв'), ['review/create-review', 'productId' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('common', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cat_id',
            'title',
            'description',
            'image',
            'price',
        ],
    ]) ?>


    <h2><?= Yii::t('common', 'Отзывы о товаре') ?></h2>


    <?php

    foreach ($reviews as $review): ?>
        <?= DetailView::widget([
            'model' => $review, 'attributes' => [
                [
                    'label' => Yii::t('common','Отзыв'),
                    'format' => 'raw',
                    'attribute' => 'text',
                ],
                [
                    'label' => false,
                    'format' => 'raw',
                    'value' => Html::a(Yii::t('common', 'Редактировать отзыв'), ['review/update', 'id' => $review['id']], ['class' => 'btn btn-success'])
                ]

            ],
        ]);

    endforeach;
    ?>


</div>
