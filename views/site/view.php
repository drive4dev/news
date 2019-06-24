<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h1 class="entry-title">
                                <?php echo Html::encode($model->title) ?>
                            </h1>

                        </header>
                        <div class="entry-content">
                            <?php echo HtmlPurifier::process($model->content) ?>
                        </div>
                        <div class="category">
                            <span>
                                <h6><a href="<?= Url::toRoute(['site/category', 'id' => $model->category->id]) ?>"> <?= $model->category->title ?></a></h6>

                            </span>
                        </div>
                        <div class="social-share">
                            <span>
                                On <?php echo Html::encode($model->getDate()) ?>
                            </span>
                        </div>
                    </div>
                </article>

                <?= $this->render('comments', [
                    'news' => $model,
                    'commentsList' => $commentsList,
                    'commentForm' => $commentForm
                ]) ?>
            </div>
        </div>
    </div>
</div>