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
        $this->createTable('category', [
            'id'         => $this->primaryKey(),
            'title'       => $this->string()->notNull(),
            'tree'       => $this->integer(),
            'lft'        => $this->integer()->notNull(),
            'rgt'        => $this->integer()->notNull(),
            'depth'      => $this->integer()->notNull(),
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

        /*$this->insert('categories', [
            'title' => 'Root',
            'tree' => '1',
            'lft' => 1,
            'rgt' => 2,
            'depth' => 0,
            'url' => '/category/1'
        ]);*/
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
