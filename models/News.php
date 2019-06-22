<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $created_at
 * @property bool $active
 * @property string $title
 * @property int $category_id
 * @property string $preview
 * @property string $content
 * @property string $slug
 *
 * @property Comment[] $comments
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'preview', 'content'], 'required'],
            [['created_at'], 'safe'],
            [['created_at'], 'date', 'format' => 'php:Y-m-d'],
            [['created_at'], 'default', 'value' => date('Y-m-d')],
            [['active'], 'boolean'],
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['content'], 'string'],
            [['title', 'preview', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'active' => 'Active',
            'title' => 'Title',
            'category_id' => 'Category',
            'preview' => 'Preview',
            'content' => 'Content',
            'slug' => 'Slug',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['news_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}