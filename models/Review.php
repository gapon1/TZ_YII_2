<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $date
 * @property string $name
 * @property string $email
 * @property string $text
 *
 * @property Product[] $products
 */
class Review extends \yii\db\ActiveRecord
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
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            [['date'], 'default', 'value' => date("Y-m-d")],
            ['email', 'email'],
            [['name', 'text'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
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



    public static function getProductReview($id)
    {
        $query = new Query();
        $query->select('review.text')
            ->from('review')
        ->join('INNER JOIN', 'product', 'review.product_id = product.id')
        ->where('product.id = '. $id);

        return $rows = $query->all();

    }



}
