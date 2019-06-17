<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Review extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email', 'text'], 'required'],
            [['date'], 'default', 'value' => date("Y-m-d")],
            ['email', 'email'],
            [['name', 'text'], 'string', 'max' => 255],
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::class,
                'targetAttribute' => ['product_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'name' => 'Name',
            'email' => 'Email',
            'text' => 'Text',
            'product_id' => 'Product ID',
        ];
    }

    public static function getProductReview(int $id): array
    {
        $query = new Query();
        $query->select('review.text, review.id')
            ->from('review')
            ->join('INNER JOIN', 'product', 'review.product_id = product.id')
            ->where('product.id = '.$id);

        return $rows = $query->all();
    }
}
