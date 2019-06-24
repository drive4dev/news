<?php

/* @var $this yii\web\View */

$this->title = 'News List';;

use yii\widgets\ListView;

echo $listDataProvider->sort->link('created_at');
echo ListView::widget([
    'dataProvider' => $listDataProvider,
    'itemView' => '_news_list',
]);