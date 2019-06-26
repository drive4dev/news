<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190616_145904_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
            'url' => $this->string(50)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-news-category_id',
            '{{%news}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE' // УДОЛИ категорию и удалятся все новости из неё
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-news-category_id',
            '{{%news}}'
        );

        $this->dropTable('{{%category}}');
    }
}
