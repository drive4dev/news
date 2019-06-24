<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="news-item">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a href="/news/<?php echo Html::encode($model->slug) ?>">
                    <?php echo Html::encode($model->title) ?>
                </a>
            </h2>
            <h5>Добавлено <?php echo Html::encode($model->getDate())?></h5>
        </div>
        <div class="panel-body"><?php echo HtmlPurifier::process($model->content) ?></div>
    </div>
</div>