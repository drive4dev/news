<?php

namespace app\controllers;

use app\models\CommentForm;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = News::getPaginatedDataProvider();

        return $this->render('index', ['listDataProvider' => $dataProvider]);
    }

    public function actionView($slug)
    {
        $news = News::findBySlug($slug);
        if ($news) {

            $commentsData = new ActiveDataProvider([
                'query' => $news->getComments(),
            ]);

            $commentForm = new CommentForm();

            return $this->render('view', [
                'model' => $news,
                'commentsList' => $commentsData,
                'commentForm' => $commentForm
            ]);
        } else {
            throw new NotFoundHttpException('Новость не найдена');
        }
    }

    public function actionCategory($id)
    {
        $dataProvider = News::getPaginatedDataProvider($id);
        return $this->render('index', ['listDataProvider' => $dataProvider]);
    }

}
