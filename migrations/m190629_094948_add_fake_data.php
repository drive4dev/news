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
        $this->insertFakeNews();
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

    public function insertFakeCategory()
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

    public function insertFakeNews()
    {
        $this->insert('news', [
            'created_at' => '2019-07-02 11:30:52',
            'active' => true,
            'title' => 'Первая новость',
            'category_id' => 4,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 1',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент',
            'slug' => 'pervaa-novost'
        ]);
        $this->insert('news', [
            'created_at' => '2019-06-02 11:30:52',
            'active' => true,
            'title' => 'новость2',
            'category_id' => 2,
            'preview' => 'новость2новость2новость2новость2',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент 2',
            'slug' => 'novost2'
        ]);

        $this->insert('news', [
            'created_at' => '2019-05-02 11:30:52',
            'active' => true,
            'title' => 'Первая новость3',
            'category_id' => 3,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 3',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент',
            'slug' => 'pervaa-novost3'
        ]);
        $this->insert('news', [
            'created_at' => '2019-05-03 11:30:52',
            'active' => true,
            'title' => 'новость4',
            'category_id' => 2,
            'preview' => 'новость2новость2новость2новость4',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент 4',
            'slug' => 'novost4'
        ]);

        $this->insert('news', [
            'created_at' => '2019-05-04 11:30:52',
            'active' => true,
            'title' => 'Первая новость5',
            'category_id' => 5,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 5',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент5',
            'slug' => 'pervaa-novost5'
        ]);
        $this->insert('news', [
            'created_at' => '2019-05-08 11:30:52',
            'active' => true,
            'title' => 'новость6',
            'category_id' => 4,
            'preview' => 'новость2новость2новость2новость6',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент 6',
            'slug' => 'novost2'
        ]);

        $this->insert('news', [
            'created_at' => '2019-05-09 11:30:52',
            'active' => true,
            'title' => 'Первая новость7',
            'category_id' => 4,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 7',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент7',
            'slug' => 'pervaa-novost7'
        ]);
        $this->insert('news', [
            'created_at' => '2019-05-19 11:30:52',
            'active' => true,
            'title' => 'Первая новость8',
            'category_id' => 6,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 8',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент8',
            'slug' => 'pervaa-novost7'
        ]);
        $this->insert('news', [
            'created_at' => '2019-05-10 11:30:52',
            'active' => true,
            'title' => 'Первая новость7',
            'category_id' => 6,
            'preview' => 'НовостьНовостьНовостьНовостьНовостьНовостьНовость 9',
            'content' => 'КонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтентКонтент9',
            'slug' => 'pervaa-novost9'
        ]);
    }
}
