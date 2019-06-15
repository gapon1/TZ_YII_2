<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $cat_id
 * @property int $review_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property int $price
 *
 * @property Category $cat
 * @property Review $review
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['cat_id', 'price', 'title'], 'required'],
            [['title', 'description', 'image'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Category',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'price' => 'Price',
        ];

    }


    public function saveImage($filename)
    {
        $this->image = $filename;

        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/uploads/no-image.png';

    }

    public static function getCategoryName()
    {
        $query = new Query();

        $query->select('category.name')
            ->from('product')
            ->join('INNER JOIN', 'category', 'category.id = product.cat_id')
        ;


        return $rows = $query->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['product_id' => 'id']);
    }


}
