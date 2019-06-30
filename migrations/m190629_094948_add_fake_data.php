<?php

use yii\db\Migration;

/**
 * Class m190629_094948_add_fake_data
 */
class m190629_094948_add_fake_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insertFakeUsers();
        $this->insertFakecategory();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

    public function insertFakeUsers()
    {
        $this->insert('user', [
            'username' => 'login',
            'password' => 'password',
            'isAdmin' => true
        ]);

        $this->insert('user', [
            'username' => 'user',
            'password' => 'password',
            'isAdmin' => false
        ]);
    }

    public function insertFakecategory()
    {
        $this->insert('category', [
            'title' => 'Root',
            'tree' => 1,
            'lft' => 1,
            'rgt' => 12,
            'depth' => 0,
            'url' => '/category/1'
        ]);
        $this->insert('category', [
            'title' => 'Первая',
            'tree' => 1,
            'lft' => 2,
            'rgt' => 9,
            'depth' => 1,
            'url' => '/category/2'
        ]);
        $this->insert('category', [
            'title' => 'Вторая',
            'tree' => 1,
            'lft' => 10,
            'rgt' => 11,
            'depth' => 1,
            'url' => '/category/3'
        ]);
        $this->insert('category', [
            'title' => 'Третья вложенная',
            'tree' => 1,
            'lft' => 3,
            'rgt' => 6,
            'depth' => 2,
            'url' => '/category/4'
        ]);
        $this->insert('category', [
            'title' => 'Четвёртая вложенная',
            'tree' => 1,
            'lft' => 7,
            'rgt' => 8,
            'depth' => 2,
            'url' => '/category/5'
        ]);
        $this->insert('category', [
            'title' => 'Пятая вложенная',
            'tree' => 1,
            'lft' => 4,
            'rgt' => 5,
            'depth' => 3,
            'url' => '/category/6'
        ]);

    }
}
