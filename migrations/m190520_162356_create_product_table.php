<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m190520_162356_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'cat_id' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->string(),
            'image' => $this->string(),
            'price' => $this->integer(),
        ]);


        $this->createIndex(
          'inx-category-cat_id',
          'product',
          'cat_id'
        );

        $this->addForeignKey(
            'fk-category-cat_id',
            'product',
            'cat_id',
            'category',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%comment}}');
    }
}
