<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m190615_150604_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'date' => $this->date(),
            'name' => $this->string(),
            'email' => $this->string(),
            'text' => $this->string(),

        ]);


        $this->createIndex(
            'inx-product-product_id',
            'review',
            'product_id'
        );

        $this->addForeignKey(
            'fk-product-product_id',
            'review',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%review}}');
    }
}
