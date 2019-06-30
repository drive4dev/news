<?php

namespace app\models;

use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property integer $tree
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

    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['title'], 'required'],
            [['tree', 'lft', 'rgt', 'depth',], 'default', 'value' => null],
            [['tree', 'lft', 'rgt', 'depth', 'parent',], 'integer'],
            [['lft', 'rgt', 'depth', 'url', 'tree'], 'safe']
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

    /**
     * Get parent's node
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->parents(1)->one();
    }

    /**
     * Get a full tree as a list, except the node and its children
     * @param  integer $node_id node's ID
     * @return array array of node
     */
    public static function getDropdownTree($node_id = 0)
    {
        // don't include children and the node
        $children = [];

        if (!empty($node_id))
            $children = array_merge(
                self::findOne($node_id)->children()->column(),
                [$node_id]
            );

        $rows = self::find()->
        select('id, title, depth')->
        where(['NOT IN', 'id', $children])->
        orderBy('tree, lft')->
        all();

        $return = [];
        foreach ($rows as $row)
            $return[$row->id] = str_repeat('-', $row->depth) . ' ' . $row->title;

        return $return;
    }

    /**
     * Get a full tree as a list, except the node and its children
     * @param  integer $node_id node's ID
     * @return array array of node
     */
    public static function getDropdownForNews($node_id = 0)
    {
        // don't include children and the node
        $children = [];

        if (!empty($node_id))
            $children = array_merge(
                self::findOne($node_id)->children()->column(),
                [$node_id]
            );

        $rows = self::find()->leaves()->all();

        $return = [];
        foreach ($rows as $row)
            $return[$row->id] = str_repeat('-', $row->depth) . ' ' . $row->title;

        return $return;
    }

    public static function getChildIds($category_id)
    {
        $category = self::findOne($category_id);

        $children = $category->children()->select('id')->all();

        $ids = [];
        if (count($children) > 0) {
            foreach ($children as $child) {
                $ids[] = $child->id;
            }
        }
        return $ids;
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
