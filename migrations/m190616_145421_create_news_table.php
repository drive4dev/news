<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m190616_145421_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'active' => $this->boolean(),
            'title' => $this->string(),
            'category_id' => $this->integer(),
            'preview' => $this->string(),
            'content' => $this->text(),
            'slug' => $this->string()
        ]);

        $this->createIndex(
            'idx-slug_news',
            '{{%news}}',
            'slug'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
