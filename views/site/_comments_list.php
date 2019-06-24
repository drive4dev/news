<?php

use yii\helpers\Html;

?>

<div class="news-item">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Пользователь <?php echo Html::encode($model->user->username) ?>
            </h2>
        </div>
        <div class="panel-body"><h5><?php echo Html::encode($model->text) ?></h5></div>
    </div>
</div>