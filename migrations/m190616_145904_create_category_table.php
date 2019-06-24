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
            'title' => $this->text(),
            'parent_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-parent_category_id',
            '{{%category}}',
            'parent_id'
            );
        $this->addForeignKey(
            'fk-news-category_id',
            '{{%news}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE' // горит сарай, гори и хата
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-parent_category_id',
            '{{%category}}'
        );
        $this->dropForeignKey(
            'fk-news-category_id',
            '{{%news}}'
        );

        $this->dropTable('{{%category}}');
    }
}
