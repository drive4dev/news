<?php

namespace app\models;


use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string']
        ];
    }

    public function saveComment($news_id)
    {
        $comment = new Comment();
        $comment->text = $this->comment;
        $comment->news_id = $news_id;
        $comment->user_id = Yii::$app->user->id;

        return $comment->save();
    }
}