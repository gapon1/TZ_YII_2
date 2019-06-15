<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m190520_162337_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'name' => $this->string(),
            'email' => $this->string(),
            'text' => $this->string(),

        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%review}}');
    }
}
