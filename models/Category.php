<?php

namespace app\models;

use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 * @property string $url
 *
 * @property News[] $news
 */
class Category extends ActiveRecord
{
    public $parent;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['title'], 'required'],
            [['lft', 'rgt', 'depth', 'parent'], 'integer'],
            [['lft', 'rgt', 'depth', 'url'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['category_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public static function getDropdown()
    {
        return ArrayHelper::map(
            self::find()->all(),
            'id',
            'title'
        );
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (empty($this->url)) {
            $this->url = '/category/' . $this->id;
            $this->updateAttributes(['url']);
        }
    }
}
