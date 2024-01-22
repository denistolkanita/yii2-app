<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;
use Yii;

class ArticleController extends Controller
{
    public function actionEdit()
    {
        if (Yii::$app->request->isGet) {
            return $this->render('edit');
        }

        if (Yii::$app->request->isPost) {
            var_dump(Yii::$app->request);
        }
    }

    public function actionCreate()
    {
        if (Yii::$app->request->isGet) {
            return $this->render('create');
        }

        if (Yii::$app->request->isPost) {
            $article = new Article();


        }
    }

    public function actionArticles()
    {
        $articles = Article::find()->all();

        return $this->render('articles', [
            'articles' => $articles,
        ]);
    }

    public function actionArticle()
    {
        $article = Article::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        ++$article->hits;
        $article->save();

        return $this->render('article', [
            'article' => $article
        ]);
    }
}